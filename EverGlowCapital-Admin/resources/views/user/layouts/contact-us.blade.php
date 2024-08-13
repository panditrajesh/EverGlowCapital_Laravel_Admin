<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="container">
        <!-- Default box -->
        <div class="contact-form-box" style="width:50%">
            <p>Contact Us</p>
            <h2>Get in touch today</h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. A eius animi sed aliquid fugit dolores
                repudiandae
                perspiciatis quas esse consequatur. Facilis, nisi? Dolor, quae quia. Sed officiis doloremque dolore
                iste?
            </p>
            <div class="border-0">

                <p>@if (session()->has('message'))
                    <div class="alert alert-success">
                        {{session()->get('message')}}
                    </div>
                @endif
                </p>
                <br>
                <form method="post">
                    @csrf
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="row mb-4">
                        <div class="col">
                            @error("firstname")
                                <span class="text-danger">* {{$message}}</span>
                            @enderror
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label" for="firstname">First name</label>
                                <input type="text" id="firstname" name="firstname" class="form-control"
                                    value="{{old('firstname')}}" />
                            </div>
                        </div>
                        <div class="col">
                            @error("lastname")
                                <span class="text-danger">* {{$message}}</span>
                            @enderror
                            <div data-mdb-input-init class="form-outline">
                                <label class="form-label" for="lastname">Last name</label>
                                <input type="text" id="lastname" name="lastname" class="form-control"
                                    value="{{old('lastname')}}" />
                            </div>
                        </div>
                    </div>
                    <!-- Email input -->
                    <div class="row mb-4">
                        <div class="col">
                            @error("email")
                                <span class="text-danger">* {{$message}}</span>
                            @enderror
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    value="{{old('email')}}" />
                            </div>
                        </div>

                        <!-- Number input -->
                        <div class="col">
                            @error("phone")
                                <span class="text-danger">* {{$message}}</span>
                            @enderror
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="phone">Phone</label>
                                <input type="text" id="phone" name="phone" class="form-control"
                                    value="{{old('phone')}}" />
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <!-- Text input -->
                        <div class="col">
                            @error("subject")
                                <span class="text-danger">* {{$message}}</span>
                            @enderror
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="subject">Subject</label>
                                <input type="text" id="subject" name="subject" class="form-control"
                                    value="{{old('subject')}}" />
                            </div>
                        </div>

                        <!-- Text input -->
                        <div class="col">
                            @error("address")
                                <span class="text-danger">* {{$message}}</span>
                            @enderror
                            <div data-mdb-input-init class="form-outline mb-4">
                                <label class="form-label" for="address">Address</label>
                                <input type="text" id="address" name="address" class="form-control"
                                    value="{{old('address')}}" />
                            </div>
                        </div>
                    </div>

                    <!-- Message input -->

                    <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="message">Your Message</label>
                        <textarea class="form-control" id="message" name="message" rows="4"
                            placeholder="Enter Your Message"></textarea>
                    </div>

                    <!-- Submit button -->
                    <a href="{{route("user.contactus")}}"><button data-mdb-ripple-init type="submit"
                            class="btn btn-success btn-block mb-4">Submit</button></a>

                </form>
            </div>
        </div>
    </div>
    <div class="faq-section" style="width:50%; margin-left:25%">
        <h2 style="text-align:center">Questions & Answers</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi possimus illo sint maxime ea distinctio
            exercitationem hic consectetur neque ex.</p>
        <div class="accordion" id="accordionExample">
            @foreach ($faqs as $data)
                <div class="accordion-item">
                    <button class="accordion-button" id="{{$data->faq_id}}" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse{{$data->faq_id}}" aria-expanded="true"
                        aria-controls="collapse{{$data->faq_id}}">
                        {{$data->question}}
                    </button>

                    <div id="collapse{{$data->faq_id}}" class="accordion-collapse collapse" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            {{$data->answer}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>

</html>