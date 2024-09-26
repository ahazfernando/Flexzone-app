<!doctype html>
<html lang="en">
<head>
    @include('livewire.home.css')
</head>
<body>

    @include('livewire.home.header')

    <div class="hero" style="background-color: black !important; padding: 20px;">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5 col-md-6 col-12">
                    <div class="intro-excerpt" style="color: white !important;">
                        <h1 style="color: #F28C28;">About Us</h1>
                        <p class="mb-4">We are the most authentic supplement provider in Sri Lanka. So what are you waiting for, place your order today.</p>
                        <p>
                            <a href="{{'/shopnow'}}" class="btn btn-secondary me-2">Shop Now</a>
                            <a href="{{'/'}}" class="btn btn-white-outline">Explore</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-12 text-center">
                    <img src="{{ asset('images/performimgfour.png') }}" class="img-fluid" style="max-width: 100%; height: auto;">
                </div>
            </div>
        </div>
    </div>

	@include('livewire.home.choseus')

    <div class="untree_co-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-5 mx-auto text-center">
                    <h2 class="section-title">Our Team</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">

                    <img src="{{ asset('images/ownerimg001.png') }}" class="img-fluid mb-5" style="border-radius: 50%; width: 200px; height: 200px; object-fit: cover;">
                    <h3>
                        <a href="https://www.linkedin.com/in/ahaz-fernando-11002720a/" class="img-fluid mb-5">
                            <span>Ahaz</span> Fernando
                        </a>
                    </h3>
                    <span class="d-block position mb-4">CEO, Founder, FlexZone Supplements Sri Lanka</span>
                    <p>With over 10 years of experience, we proudly serve Sri Lanka's health community. Located in the heart of Kandy, we offer trusted supplements to fuel your wellness journey.</p>
                    <p class="mb-0">
                        <a href="https://www.linkedin.com/in/ahaz-fernando-11002720a/" class="more dark">Learn More
                            <span class="icon-arrow_forward"></span>
                        </a>
                    </p>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">

                    <img src="{{ asset('images/ownerimg002.png') }}" class="img-fluid mb-5" style="border-radius: 50%; width: 200px; height: 200px; object-fit: cover;">
                    <h3>
                        <a href="https://www.linkedin.com/in/ahaz-fernando-11002720a/" class="img-fluid mb-5">
                            <span>Sandeepa</span> Lakshan
                        </a>
                    </h3>
                    <span class="d-block position mb-4">CoFounder, FlexZone Supplements Sri Lanka</span>
                    <p>With over 10 years of experience, we proudly serve Sri Lanka's health community. Located in the heart of Kandy, we offer trusted supplements to fuel your wellness journey.</p>
                    <p class="mb-0">
                        <a href="https://www.linkedin.com/in/ahaz-fernando-11002720a/" class="more dark">Learn More
                            <span class="icon-arrow_forward"></span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="testimonial-section before-footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto text-center">
                    <h2 class="section-title">Testimonials</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="testimonial-slider-wrap text-center">
                        <div id="testimonial-nav">
                            <span class="prev" data-controls="prev">
                                <span class="fa fa-chevron-left"></span>
                            </span>
                            <span class="next" data-controls="next">
                                <span class="fa fa-chevron-right"></span>
                            </span>
                        </div>
                        <div class="testimonial-slider">
                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 mx-auto">
                                        <div class="testimonial">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.home.footer')
</body>
</html>
