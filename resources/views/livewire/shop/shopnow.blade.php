<!doctype html>
<html lang="en">
<head>
    @include('livewire.home.css')
</head>

<body>

    <!-- Start Header/Navigation -->
    @include('livewire.home.header')
    <!-- End Header/Navigation -->

    <!-- Start Hero Section -->
    <div class="hero" style="background-color: black !important; padding: 20px;">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5 col-md-6 col-12">
                    <div class="intro-excerpt" style="color: white !important;">
                        <h1 style="color: #F28C28;">Shop Now</h1>
                        <p class="mb-4">
                            Shop the best, buy the best from the most authentic supplement shop in Sri Lanka.
                        </p>
                        <p>
                            <a href="" class="btn btn-secondary me-2">Shop Now</a>
                            <a href="#" class="btn btn-white-outline">Explore</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-12 text-center">
                    <img src="{{ asset('images/allimg001.png') }}" class="img-fluid" style="max-width: 100%; height: auto;">
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <!-- Start Product Section -->
    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">
                <!-- Start Column 1 -->
                @include('livewire.shop.shopproducts')
                <!-- End Column 1 -->
            </div>
        </div>
    </div>
    <!-- End Product Section -->

    <!-- Start Footer Section -->
    @include('livewire.home.footer')
    <!-- End Footer Section -->

</body>
</html>
