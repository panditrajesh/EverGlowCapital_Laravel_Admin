<?php

namespace App\Http\Controllers;

use Cookie;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Contact_Us;
use App\Models\Newsletter;
use App\Models\Faq_Section;
use Illuminate\Support\Str;
use App\Models\Blog_Section;
use Illuminate\Http\Request;
use App\Models\Benefit_Section;
use App\Models\User_Registration;
use Illuminate\Support\Facades\DB;
use App\Models\Testimonial_Section;
use App\Models\Subscription_Section;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function getRegistrationForm()
    {
        return view("admin.auth.registration");
    }
    public function postRegistrationForm(Request $request)
    {
        $request->validate([
            "name" => "required|max:30",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8|same:retypepassword",
            "retypepassword" => "required",
        ]);

        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->retypepassword = Hash::make($request->retypepassword);
        $users->save();
        return redirect()->route("admin.form.registration")->with("message", "Registration Successful!!");
    }

    //login
    public function getLoginForm(Request $request)
    {
        return view("admin.auth.login");
    }
    public function postLoginForm(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);
        $remember = $request->has('remember_me');
        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            // if (isset($request->remember_me) && !empty($request->remember_me)) {
            //     setCookie('email', $request->email, time() + 3600);
            //     setCookie('password', $request->password, time() + 3600);
            // } else {
            //     setCookie('email', '');
            //     setCookie('password', '');
            // }
            // If "Remember Me" is checked, store the email and password in cookies
            if ($remember) {
                Cookie::queue('remember_email', $request->email, 120); // Store for 120 minutes
                Cookie::queue('remember_password', encrypt($request->password), 120); // Encrypt password
            } else {
                // If "Remember Me" is not checked, forget the cookies
                Cookie::queue(Cookie::forget('remember_email'));
                Cookie::queue(Cookie::forget('remember_password'));
            }
            return redirect()->route("admin.dashboard");
        } else {
            return redirect()->back()->with("message", "Invalid Credentials!! Please try again with correct one.");
        }
    }

    //forget password
    public function adminForgotPassword(Request $request)
    {
        return view('admin.auth.forgot-password');
    }
    public function adminForgotPasswordSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $token = Str::random(64);
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::send('admin.email.forgot-password', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    public function adminResetPassword(Request $request, $token)
    {
        //if the token is invalid, the user can't get the reset password page.
        //to do so, select token from the table, then check the count, if the count is 0, then the token is invalid, else return the reset password page
        $tokens = DB::table('password_reset_tokens')->where('token', $token)->get();
        // dd($tokens);
        if ($tokens->count() > 0) {
            return view('admin.auth.reset-password', ['token' => $token]);
        }
        return abort('404');
    }

    public function adminPostResetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:8|same:retypepassword',
            'retypepassword' => 'required'
        ]);

        // $updatePassword = DB::table('password_reset_tokens')->where(['email' => $request->email, 'token' => $request->token])->first();
        // if (!$updatePassword) {
        //     return redirect()->back()->with('error', 'Invalid token!');
        // }

        //update the new password in the users table
        User::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

        //delete the token, after the reset process is successful, so that the user can use it for only once
        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();
        return redirect()->route("admin.form.login")->with('success', 'Password has changed Successfully!');
    }

    //dashboard-admin panel
    public function index(Request $request)
    {
        //select all records from database of required tables, then compact them and return to required views
        $users_count = User_Registration::all()->count();
        // dd($users);
        $contacts_count = Contact_Us::all()->count();
        $blogs_count = Blog_Section::all()->count();
        $testimonials_count = Testimonial_Section::all()->count();
        $faqs_count = Faq_Section::all()->count();
        $benefits_count = Benefit_Section::all()->count();
        $newsletters_count = Newsletter::all()->count();
        return view("admin.dashboard", compact('users_count', 'contacts_count', 'blogs_count', 'testimonials_count', 'faqs_count', 'benefits_count', 'newsletters_count'));
    }

    //admin contact us
    public function adminContactUs(Request $request)
    {
        $contacts = Contact_Us::get();
        // dd($contacts);
        return view('admin.pages.contact-us', compact('contacts'));
    }
    public function adminViewContactUs(Request $request, $id)
    {
        $data = Contact_Us::where('user_id', $id)->first();
        // dd($contacts);
        return view('admin.pages.view-contact-us', compact('data'));
    }
    //admin faq
    public function adminFaq(Request $request)
    {
        return view('admin.pages.faq-section');
    }

    public function adminSubmitFaq(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $faqs = new Faq_Section;
        $faqs->question = $request->question;
        $faqs->answer = $request->answer;
        $faqs->save();
        return redirect()->route('admin.faq.list')->with('message', 'FAQ added Successfully');
    }

    //faq list
    public function adminFaqList(Request $request)
    {
        $faqs = Faq_Section::all();
        return view('admin.pages.faq-list', compact('faqs'));
    }

    //delete faq
    public function adminFaqDelete(Request $request, $id)
    {
        Faq_Section::where('faq_id', $id)->delete();
        return redirect()->back()->with('message', 'FAQ Deleted Successfully');
    }

    //edit faq
    public function adminFaqEdit(Request $request, $id)
    {
        $faqs = Faq_Section::where('faq_id', $id)->first();
        // dd($faqs);
        return view('admin.pages.update-faq', compact('faqs'));
    }
    //update faq
    public function adminFaqUpdate(Request $request, $id)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $faq = Faq_Section::find($id);
        // dd($faq);
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        return redirect()->route('admin.faq.list');
    }

    //registered details
    public function getRegisteredUsers(Request $request)
    {
        $users = User_Registration::all();
        return view('admin/pages/registration-details', compact('users'));
    }
    //view registered user profile
    public function getViewRegisteredUsers(Request $request, $id)
    {
        $data = User_Registration::where('user_id', $id)->first();
        return view('admin/pages/view-registration-details', compact('data'));
    }

    //subscription
    public function adminSubscription(Request $request)
    {
        return view('admin.pages.subscription-section');
    }
    public function adminPostSubscription(Request $request)
    {
        $request->validate([
            'subscription_heading' => 'required',
            'subscription_para' => 'required',
        ]);
        $users = new Subscription_Section();
        $users->subscription_heading = $request->subscription_heading;
        $users->subscription_para = $request->subscription_para;
        $users->save();
        return redirect()->back()->with('success', 'Data added Successfully');
    }
    //subscription list
    public function adminSubscriptionList(Request $request)
    {
        $subscriptions = Subscription_Section::all();
        return view('admin.pages.subscription-list', compact('subscriptions'));
    }
    //delete subscription
    public function adminSubscriptionDelete(Request $request, $id)
    {
        Subscription_Section::where('subscription_id', $id)->delete();
        return redirect()->back()->with('success', 'Entry Deleted Successfully');
    }
    //edit subscription
    public function adminSubscriptionEdit(Request $request, $id)
    {
        $subscriptions = Subscription_Section::where('subscription_id', $id)->first();
        return view('admin.pages.update-subscription', compact('subscriptions'));
    }
    //update subscription
    public function adminSubscriptionUpdate(Request $request, $id)
    {
        $request->validate([
            'subscription_heading' => 'required',
            'subscription_para' => 'required',
        ]);
        $subscriptions = Subscription_Section::find($id);
        $subscriptions->subscription_heading = $request->subscription_heading;
        $subscriptions->subscription_para = $request->subscription_para;
        $subscriptions->save();
        return redirect()->route('admin.subscription.list');
    }

    //admin newsletter
    public function adminNewsletter(Request $request)
    {
        return view('admin.pages.newsletter.add-newsletter');
    }

    public function adminPostNewsletter(Request $request)
    {
        $request->validate([
            'newsletter_image' => 'required',
            'newsletter_price' => 'required',
            'newsletter_heading' => 'required',
            'newsletter_title' => 'required|unique:newsletters,newsletter_title',
            'newsletter_shortdesc' => 'required',
        ]);
        $newsletter = new Newsletter();
        $newsletter->newsletter_image = $request->file('newsletter_image')->store('', 'file_upload');
        $newsletter->newsletter_price = $request->newsletter_price;
        $newsletter->newsletter_heading = $request->newsletter_heading;
        $newsletter->newsletter_title = $request->newsletter_title;
        $newsletter->newsletter_shortdesc = $request->newsletter_shortdesc;
        $newsletter->save();
        return redirect()->back()->with('success', 'NewsLetter Added Successfully');
    }
    //admin newsletter list
    public function adminNewsletterList(Request $request)
    {
        $newsletters = Newsletter::all();
        return view('admin.pages.newsletter.newsletter-list', compact('newsletters'));
    }
    //delete newsletter
    public function adminNewsletterDelete(Request $request, $id)
    {
        Newsletter::where('newsletter_id', decrypt($id))->delete();
        return redirect()->back()->with('success', 'Newsletter deleted successfully');
    }
    //edit newsletter
    public function adminNewsletterEdit(Request $request, $id)
    {
        $newsletter = Newsletter::find(decrypt($id));
        return view('admin.pages.newsletter.update-newsletter', compact('newsletter'));
    }
    public function adminNewsletterUpdate(Request $request, $id)
    {
        $request->validate([
            'newsletter_image' => 'required',
            'newsletter_price' => 'required',
            'newsletter_heading' => 'required',
            'newsletter_title' => 'required|unique:newsletters,newsletter_title',
            'newsletter_shortdesc' => 'required',
        ]);
        $newsletter = Newsletter::find(decrypt($id));
        $newsletter->newsletter_image = $request->file('newsletter_image')->store('', 'file_upload');
        $newsletter->newsletter_price = $request->newsletter_price;
        $newsletter->newsletter_heading = $request->newsletter_heading;
        $newsletter->newsletter_title = $request->newsletter_title;
        $newsletter->newsletter_shortdesc = $request->newsletter_shortdesc;
        $newsletter->save();
        return redirect()->route('admin.newsletter.list');
    }
    //blog
    public function adminBlog(Request $request)
    {
        return view('admin.pages.blog-section');
    }
    public function adminPostBlog(Request $request)
    {
        // dd($request);
        $request->validate([
            'blog_para' => 'required',
            'blog_section_heading' => 'required',
            'blog_image' => 'required',
            'blog_category' => 'required',
            'blog_heading' => 'required|unique:blog_section,blog_heading',
            'blog_shortdesc' => 'required',
        ]);
        // $request->file('productimage')->store('uploads','public')
        $blogs = new Blog_Section;
        $blogs->blog_para = $request->blog_para;
        $blogs->blog_section_heading = $request->blog_section_heading;
        $blogs->blog_image = $request->file('blog_image')->store('', 'file_upload');
        // $imageName = time() . '.' . $request->file('blog_image')->getClientOriginalExtension();
        // $request->file('blog_image')->storeAs('uploads', $imageName);
        // dd($request->file('blog_image'));

        $blogs->blog_category = $request->blog_category;
        $blogs->blog_heading = $request->blog_heading;
        $blogs->blog_shortdesc = $request->blog_shortdesc;
        // dd($blogs);
        $blogs->save();
        return redirect()->route('admin.blog.list');
    }
    //admin blog list
    public function adminBlogList(Request $request)
    {
        $blogs = Blog_Section::all();
        return view('admin.pages.blog-list', compact('blogs'));
    }
    public function adminBlogDelete(Request $request, $id)
    {
        Blog_Section::where('blog_id', $id)->delete();
        return redirect()->back()->with('success', 'Data deleted Successfully');
    }
    public function adminBlogEdit(Request $request, $id)
    {
        $blogs = Blog_Section::where('blog_id', $id)->first();
        return view('admin.pages.update-blog', compact('blogs'));
    }
    public function adminBlogUpdate(Request $request, $id)
    {
        $request->validate([
            'blog_para' => 'required',
            'blog_section_heading' => 'required',
            'blog_image' => 'required',
            'blog_category' => 'required',
            'blog_heading' => 'required|unique:blog_section,blog_heading',
            'blog_shortdesc' => 'required',
        ]);
        $blog = Blog_Section::find($id);
        $blog->blog_para = $request->blog_para;
        $blog->blog_section_heading = $request->blog_section_heading;
        $blog->blog_image = $request->file('blog_image')->store('', 'file_upload');
        // $imageName = time() . '.' . $request->file('blog_image')->getClientOriginalExtension();
        // $request->file('blog_image')->storeAs('uploads', $imageName);
        // dd($request->file('blog_image'));

        $blog->blog_category = $request->blog_category;
        $blog->blog_heading = $request->blog_heading;
        $blog->blog_shortdesc = $request->blog_shortdesc;
        // dd($blogs);
        $blog->save();
        return redirect()->back()->with('success', 'Updated Successfully');
    }

    //admin testimonials
    public function adminTestimonial(Request $request)
    {
        return view("admin.pages.testimonial-section");
    }

    public function adminPostTestimonial(Request $request)
    {
        $request->validate([
            'testimonial_section_heading' => 'required',
            'testimonial_image' => 'required',
            'testimonial_heading' => 'required',
            'testimonial_shortdesc' => 'required',
            'testimonial_author' => 'required',
            'testimonial_author_position' => 'required',
        ]);
        $testimonials = new Testimonial_Section();
        $testimonials->testimonial_section_heading = $request->testimonial_section_heading;
        $testimonials->testimonial_image = $request->file('testimonial_image')->store('', 'file_upload');
        $testimonials->testimonial_heading = $request->testimonial_heading;
        $testimonials->testimonial_shortdesc = $request->testimonial_shortdesc;
        $testimonials->testimonial_author = $request->testimonial_author;
        $testimonials->testimonial_author_position = $request->testimonial_author_position;
        $testimonials->save();
        return redirect()->back()->with('success', 'Testimonial Added Successfully');

    }

    public function adminTestimonialList(Request $request)
    {
        $testimonials = Testimonial_Section::all();
        return view('admin.pages.testimonial-list', compact('testimonials'));
    }

    public function adminTestimonialDelete(Request $request, $id)
    {
        Testimonial_Section::where('testimonial_id', $id)->delete();
        return redirect()->back()->with('success', 'Data deleted Successfully');
    }
    public function adminTestimonialEdit(Request $request, $id)
    {
        $testimonials = Testimonial_Section::where('testimonial_id', $id)->first();
        return view('admin.pages.update-testimonial', compact('testimonials'));
    }
    public function adminTestimonialUpdate(Request $request, $id)
    {
        $request->validate([
            'testimonial_section_heading' => 'required',
            'testimonial_heading' => 'required',
            'testimonial_shortdesc' => 'required',
            'testimonial_author' => 'required',
            'testimonial_author_position' => 'required',
        ]);
        $testimonials = Testimonial_Section::find($id);
        $testimonials->testimonial_section_heading = $request->testimonial_section_heading;
        $testimonials->testimonial_image = $request->file('testimonial_image')->store('', 'file_upload');
        $testimonials->testimonial_heading = $request->testimonial_heading;
        $testimonials->testimonial_shortdesc = $request->testimonial_shortdesc;
        $testimonials->testimonial_author = $request->testimonial_author;
        $testimonials->testimonial_author_position = $request->testimonial_author_position;
        $testimonials->save();
        return redirect()->route('admin.testimonial.list');

    }

    //perks and benefit
    public function adminBenefit(Request $request)
    {
        return view('admin.pages.perks-and-benefit');
    }

    public function adminPostBenefit(Request $request)
    {
        $request->validate([
            'benefit_heading' => 'required',
            'benefit_image' => 'required',
            'benefit_name' => 'required',
            'benefit_desc' => 'required',
        ]);
        $benefits = new Benefit_Section();
        $benefits->benefit_heading = $request->benefit_heading;
        $benefits->benefit_image = $request->file('benefit_image')->store('', 'file_upload');
        $benefits->benefit_name = $request->benefit_name;
        $benefits->benefit_desc = $request->benefit_desc;
        $benefits->save();
        return redirect()->back()->with('success', 'Benefit Added Successfully');
    }

    public function adminBenefitList(Request $request)
    {
        $benefits = Benefit_Section::all();
        return view('admin.pages.perks-and-benefit-list', compact('benefits'));
    }

    //delete benefit
    public function adminBenefitDelete(Request $request, $id)
    {
        Benefit_Section::where('benefit_id', $id)->delete();
        return redirect()->back()->with('message', 'Benefit Deleted Successfully');
    }

    public function adminBenefitEdit(Request $request, $id)
    {
        $benefits = Benefit_Section::where('benefit_id', $id)->first();
        // dd($faqs);
        return view('admin.pages.update-benefit', compact('benefits'));
    }

    public function adminBenefitUpdate(Request $request, $id)
    {
        $request->validate([
            'benefit_heading' => 'required',
            'benefit_name' => 'required',
            'benefit_desc' => 'required',
        ]);
        $benefits = Benefit_Section::find($id);
        $benefits->benefit_heading = $request->benefit_heading;
        $benefits->benefit_image = $request->file('benefit_image')->store('', 'file_upload');
        $benefits->benefit_name = $request->benefit_name;
        $benefits->benefit_desc = $request->benefit_desc;
        $benefits->save();
        return redirect()->route('admin.benefit.list');
    }

    //get admin profile
    public function adminProfile(Request $request)
    {
        $userId = Auth::id();
        $admin = User::where('id', $userId)->first();
        return view('admin/admin-profile', compact('admin'));

    }
    //admin profile edit
    public function adminEditProfile(Request $request)
    {
        $id = Auth::id();
        $data = User::where('id', $id)->first();
        // dd($data);
        return view('admin.edit-profile', compact('data'));
    }
    public function adminUpdateProfile(Request $request, $id)
    {

        $request->validate([
            'admin_name' => 'required',
            'admin_email' => 'required',
            'admin_image' => 'required'
        ]);
        $user = User::find($id);
        $user->name = $request->admin_name;
        $user->email = $request->admin_email;
        $user->admin_image = $request->file('admin_image')->store('', 'file_upload');
        $user->save();
        return redirect()->route('admin.profile');
    }

    //admin logout
    public function adminLogout(Request $request)
    {
        Auth::logout();
        // Optionally clear remember me cookies on logout
        // Cookie::queue(Cookie::forget('remember_email'));
        // Cookie::queue(Cookie::forget('remember_password'));
        return redirect()->route('admin.form.login');
    }





    //Website Controller
    //site home
    public function getHome(Request $request)
    {
        return view("user.home");
    }

    //user registration
    public function getUserRegister(Request $request)
    {
        return view('user.auth.registration');
    }
    //user registration
    public function postUserRegister(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:user_registration,email',
            'phone' => 'required|min:10|max:12|unique:user_registration,phone',
            'username' => 'required|unique:user_registration,username',
            'password' => 'required|same:confirmpassword|min:8',
            'confirmpassword' => 'required',
        ]);
        $users = new User_Registration();
        $users->firstname = $request->firstname;
        $users->lastname = $request->lastname;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->username = $request->username;
        $users->password = Hash::make($request->password);
        $users->confirmpassword = Hash::make($request->confirmpassword);
        $users->save();
        return redirect()->back()->with('message', 'Registration Successful!!!!!');
    }

    //user login
    public function getUserLogin(Request $request)
    {
        return view('user.auth.login');
    }
    //user login form submit
    public function postUserLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('user.home')->with('message', 'Logged in Successfully!!');
        }
        return redirect()->back()->with('error', 'Invalid Credentials!! Try again');
    }
    //Contact Us
    public function contactUs(Request $request)
    {
        return view("user.layouts.contact-us");
    }
    //contact us form submit
    public function postContactUs(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:contact_us,email',
            'phone' => 'required|max:12|min:11',
            'subject' => 'required',
            'address' => 'required',
        ]);

        $contacts = new Contact_Us;
        $contacts->firstname = $request->firstname;
        $contacts->lastname = $request->lastname;
        $contacts->email = $request->email;
        $contacts->phone = $request->phone;
        $contacts->subject = $request->subject;
        $contacts->address = $request->address;
        $contacts->message = $request->message;
        $contacts->save();
        return redirect()->back()->with('message', 'Query Submitted Successfully!!');
    }
    //display faqs
    public function displayFaq(Request $request)
    {
        $faqs = Faq_Section::all();
        return view('user/layouts/contact-us', compact('faqs'));
    }

    //display blogs
    public function displayBlogs(Request $request)
    {
        $blogs = Blog_Section::all();
        return view('user.layouts.our-blogs', compact('blogs'));
    }

    //display testimonial
    public function displayTestimonials(Request $request)
    {
        $testimonials = Testimonial_Section::all();
        return view('user.layouts.testimonials', compact('testimonials'));
    }

    //display subscription
    public function displaySubscription(Request $request)
    {
        $subscriptions = Subscription_Section::all();
        return view('user.layouts.subscription', compact('subscriptions'));
    }

    // About Us
    public function aboutUs(Request $request)
    {
        $benefits = Benefit_Section::all();
        return view("user.layouts.about-us", compact("benefits"));
    }
    // //how it works
    // public function howItWorks(Request $request)
    // {
    //     return view("layouts/how-it-works");
    // }

}
