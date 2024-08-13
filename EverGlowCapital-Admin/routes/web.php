<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;

//admin routes
//registration
Route::get("/everglow-capital/register", [AdminController::class, "getRegistrationForm"])->name("admin.form.registration");
Route::post("/everglow-capital/register", [AdminController::class, "postRegistrationForm"])->name("admin.form.registration");
//login
Route::get("/everglow-capital/admin", [AdminController::class, "getLoginForm"])->name("admin.form.login");
Route::post("/everglow-capital/admin", [AdminController::class, "postLoginForm"])->name("admin.form.login");
//dashboard
Route::get("/everglow-capital/admin/dashboard", [AdminController::class, "index"])->name("admin.dashboard")->middleware(AdminMiddleware::class);
//contact us
Route::get("everglow-capital/admin/contact-us", [AdminController::class, "adminContactUs"])->name("admin.contactus")->middleware(AdminMiddleware::class);
Route::get("everglow-capital/admin/contact-us/{id}", [AdminController::class, "adminViewContactUs"])->name('admin.view.contactus')->middleware(AdminMiddleware::class);
//faq
Route::get("everglow-capital/admin/faq", [AdminController::class, "adminFaq"])->name("admin.faq")->middleware(AdminMiddleware::class);
//submit faq
Route::post("everglow-capital/admin/faq", [AdminController::class, "adminSubmitFaq"])->name("admin.faq")->middleware(AdminMiddleware::class);
//faq list
Route::get("everglow-capital/admin/faq-list", [AdminController::class, "adminFaqList"])->name("admin.faq.list")->middleware(AdminMiddleware::class);
//delete faq
Route::get("everglow-capital/admin/faq/delete/{id}", [AdminController::class, "adminFaqDelete"])->name("admin.faq.delete")->middleware(AdminMiddleware::class);
//edit faq
Route::get("everglow-capital/admin/faq/edit/{id}", [AdminController::class, "adminFaqEdit"])->name("admin.faq.edit")->middleware(AdminMiddleware::class);
//update faq
Route::post("everglow-capital/admin/faq/edit/{id}", [AdminController::class, "adminFaqUpdate"])->name("admin.faq.update")->middleware(AdminMiddleware::class);
//registered users
Route::get("everglow-capital/admin/registered-users", [AdminController::class, "getRegisteredUsers"])->name("admin.registereduser")->middleware(AdminMiddleware::class);
Route::get("everglow-capital/admin/registered-users/{id}", [AdminController::class, "getViewRegisteredUsers"])->name("admin.view.registereduser")->middleware(AdminMiddleware::class);
//subscription
Route::get("everglow-capital/admin/subscription", [AdminController::class, "adminSubscription"])->name("admin.subscription")->middleware(AdminMiddleware::class);
Route::post("everglow-capital/admin/subscription", [AdminController::class, "adminPostSubscription"])->name("admin.subscription")->middleware(AdminMiddleware::class);
//subscription list
Route::get("everglow-capital/admin/subscription-list", [AdminController::class, "adminSubscriptionList"])->name("admin.subscription.list")->middleware(AdminMiddleware::class);
//delete subscription
Route::get("everglow-capital/admin/subscription/delete/{id}", [AdminController::class, "adminSubscriptionDelete"])->name("admin.subscription.delete")->middleware(AdminMiddleware::class);
Route::get("everglow-capital/admin/subscription/edit/{id}", [AdminController::class, "adminSubscriptionEdit"])->name("admin.subscription.edit")->middleware(AdminMiddleware::class);
Route::post("everglow-capital/admin/subscription/edit/{id}", [AdminController::class, "adminSubscriptionUpdate"])->name("admin.subscription.update")->middleware(AdminMiddleware::class);
//newsletter
Route::get("everglow-capital/admin/newsletter", [AdminController::class, "adminNewsletter"])->name("admin.newsletter")->middleware(AdminMiddleware::class);
Route::post("everglow-capital/admin/newsletter", [AdminController::class, "adminPostNewsletter"])->name("admin.newsletter")->middleware(AdminMiddleware::class);
//newsletter list
Route::get("everglow-capital/admin/newsletter-list", [AdminController::class, "adminNewsletterList"])->name("admin.newsletter.list")->middleware(AdminMiddleware::class);
//delete newsletter
Route::get("everglow-capital/admin/newsletter/delete/{id}", [AdminController::class, "adminNewsletterDelete"])->name("admin.newsletter.delete")->middleware(AdminMiddleware::class);
//edit newsletter
Route::get("everglow-capital/admin/newsletter/edit/{id}", [AdminController::class, "adminNewsletterEdit"])->name("admin.newsletter.edit")->middleware(AdminMiddleware::class);
Route::post("everglow-capital/admin/newsletter/edit/{id}", [AdminController::class, "adminNewsletterUpdate"])->name("admin.newsletter.update")->middleware(AdminMiddleware::class);
//blog section
Route::get("everglow-capital/admin/blog", [AdminController::class, "adminBlog"])->name("admin.blog")->middleware(AdminMiddleware::class);
Route::post("everglow-capital/admin/blog", [AdminController::class, "adminPostBlog"])->name("admin.blog")->middleware(AdminMiddleware::class);
//blog list
Route::get("everglow-capital/admin/blog-list", [AdminController::class, "adminBlogList"])->name("admin.blog.list")->middleware(AdminMiddleware::class);
//delete blog
Route::get("everglow-capital/admin/blog/delete/{id}", [AdminController::class, "adminBlogDelete"])->name("admin.blog.delete")->middleware(AdminMiddleware::class);
//update blog
Route::get("everglow-capital/admin/blog/edit/{id}", [AdminController::class, "adminBlogEdit"])->name("admin.blog.edit")->middleware(AdminMiddleware::class);
Route::post("everglow-capital/admin/blog/edit/{id}", [AdminController::class, "adminBlogUpdate"])->name("admin.blog.update")->middleware(AdminMiddleware::class);
//testimonial
Route::get("everglow-capital/admin/testimonial", [AdminController::class, "adminTestimonial"])->name("admin.testimonial")->middleware(AdminMiddleware::class);
Route::post("everglow-capital/admin/testimonial", [AdminController::class, "adminPostTestimonial"])->name("admin.testimonial")->middleware(AdminMiddleware::class);
//testimonial list
Route::get("everglow-capital/admin/testimonial-list", [AdminController::class, "adminTestimonialList"])->name("admin.testimonial.list")->middleware(AdminMiddleware::class);
//delete blog
Route::get("everglow-capital/admin/testimonial/delete/{id}", [AdminController::class, "adminTestimonialDelete"])->name("admin.testimonial.delete")->middleware(AdminMiddleware::class);
//update blog
Route::get("everglow-capital/admin/testimonial/edit/{id}", [AdminController::class, "adminTestimonialEdit"])->name("admin.testimonial.edit")->middleware(AdminMiddleware::class);
Route::post("everglow-capital/admin/testimonial/edit/{id}", [AdminController::class, "adminTestimonialUpdate"])->name("admin.testimonial.update")->middleware(AdminMiddleware::class);
//perks and benefits
Route::get("everglow-capital/admin/benefit", [AdminController::class, "adminBenefit"])->name("admin.benefit")->middleware(AdminMiddleware::class);
Route::post("everglow-capital/admin/benefit", [AdminController::class, "adminPostBenefit"])->name("admin.benefit")->middleware(AdminMiddleware::class);
//benefit list
Route::get("everglow-capital/admin/benefit-list", [AdminController::class, "adminBenefitList"])->name("admin.benefit.list")->middleware(AdminMiddleware::class);
//delete benefit
Route::get("everglow-capital/admin/benefit/delete/{id}", [AdminController::class, "adminBenefitDelete"])->name("admin.benefit.delete")->middleware(AdminMiddleware::class);
//update benefit
Route::get("everglow-capital/admin/benefit/edit/{id}", [AdminController::class, "adminBenefitEdit"])->name("admin.benefit.edit")->middleware(AdminMiddleware::class);
Route::post("everglow-capital/admin/benefit/edit/{id}", [AdminController::class, "adminBenefitUpdate"])->name("admin.benefit.update")->middleware(AdminMiddleware::class);
//get admin profile
Route::get("everglow-capital/admin/profile", [AdminController::class, "adminProfile"])->name('admin.profile')->middleware(AdminMiddleware::class);
//edit admin profile
Route::get("everglow-capital/admin/profile/edit/{id}", [AdminController::class, "adminEditProfile"])->name('admin.profile.edit')->middleware(AdminMiddleware::class);
//update detaials
Route::post("everglow-capital/admin/profile/edit/{id}", [AdminController::class, "adminUpdateProfile"])->name('admin.profile.update')->middleware(AdminMiddleware::class);
//logout admin
Route::get('everglow-capital/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
//forget password
Route::get('everglow-capital/admin/forgot-password', [AdminController::class, 'adminForgotPassword'])->name('admin.forgot.password');
Route::post('everglow-capital/admin/forgot-password', [AdminController::class, 'adminForgotPasswordSubmit'])->name('admin.forgot.password');
//reset password
Route::get('everglow-capital/admin/reset-password/{token}', [AdminController::class, 'adminResetPassword'])->name('admin.reset.password');
Route::post('everglow-capital/admin/reset-password', [AdminController::class, 'adminPostResetPassword'])->name('admin.reset.password.post');



//User routes
//home page
Route::get("everglow-capital", [AdminController::class, "getHome"])->name("user.home")->middleware(UserMiddleware::class);
//register user
Route::get("everglow-capital/register-user", [AdminController::class, "getUserRegister"])->name("user.form.register");
Route::post("everglow-capital/register-user", [AdminController::class, "postUserRegister"])->name("user.form.register");
//login user
Route::get("everglow-capital/login-user", [AdminController::class, "getUserLogin"])->name("user.form.login");
Route::post("everglow-capital/login-user", [AdminController::class, "postUserLogin"])->name("user.form.login");
//contact us
Route::get("everglow-capital/contact-us", [AdminController::class, "contactUs"])->name("user.contactus")->middleware(UserMiddleware::class);
Route::post("everglow-capital/contact-us", [AdminController::class, "postContactUs"])->name("user.contactus")->middleware(UserMiddleware::class);
//display faqs
Route::get("everglow-capital/contact-us", [AdminController::class, "displayFaq"])->name("user.faq")->middleware(UserMiddleware::class);
//our blogs
Route::get("everglow-capital/our-blogs", [AdminController::class, "displayBlogs"])->name("user.blog");
//testimonials
Route::get("everglow-capital/testimonials", [AdminController::class, "displayTestimonials"])->name("user.testimonial");
//subscription
Route::get("everglow-capital/subscription", [AdminController::class, "displaySubscription"])->name("user.subscription");
// about us
Route::get("everglow-capital/about-us", [AdminController::class, "aboutUs"])->name("pages.aboutus.benefit");
//how it works
// Route::get("everglow-capital/how-it-works", [AdminController::class, "howItWorks"])->name("pages.howitworks");


