<!-- Start Hero Section -->
<div class="hero" style="background-color: #000;">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-5">
        <div class="intro-excerpt">
          <h1 style="color: #F28C28;">Burn Fat<br><span class="d-block">Build Muscle </span></h1>
          <p class="mb-4" style="color: #FFF;">Unlock your true potential with the ultimate fuel for gains. Elevate your workouts, sculpt your dream physique!</p>
          <p>
            <a href="{{'/shopnow'}}" class="btn btn-secondary me-2">Shop Now</a>
            <a href="{{'/'}}" class="btn btn-white-outline">Explore</a>
          </p>
        </div>
      </div>
 <div class="col-lg-7 col-md-6 col-12 text-center">
    <img src="{{ asset('images/mtechimg01.png') }}" class="img-fluid" style="max-width: 80%; height: auto;">
  </div>
    </div>
  </div>
</div>
<!-- End Hero Section -->

<!-- Start Product Section -->
<div class="product-section">
  <div class="container">
    <div class="row">

      <!-- Start Column 1 -->
      <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
        <h2 class="mb-4 section-title">The Best Supplements right to your doorstep.</h2>
        <p class="mb-4">Prioritizing protein intake is essential for many, with plenty of us consuming a protein shake after a workout, enjoying a protein bar as a snack throughout the day.</p>
        <p><a href="shop.html" class="btn">Explore</a></p>
      </div>
      <!-- End Column 1 -->

      <!-- Start Products -->
      @foreach($product as $item)
      <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
        <a class="product-item" href="{{ url('product_mastercard', $item->id) }}">
          <img src="products/{{$item->product_image}}" class="img-fluid product-thumbnail">
          <h3 class="product-title">{{$item->product_name}}</h3>
          @if($item->product_discount != null)
          <strong class="product-price" style="color:#FF5733;">LKR &nbsp;{{$item->product_discount}}</strong>
          <strong style="text-decoration:line-through;" class="product-price">LKR &nbsp;{{$item->product_price}}</strong>
          @else
          <strong class="product-price">LKR &nbsp;{{$item->product_price}}</strong>
          @endif
        </a>
        <div class="d-flex justify-content-center mt-3">
          <a href="{{ url('add_to_cart', $item->id) }}" class="add-to-cart-btn">
            Add to Cart
          </a>
        </div>
      </div>
      @endforeach
      {!! $product->withQueryString()->links('pagination::bootstrap-5') !!}
      <!-- End Products -->

      <style>
        .pagination {
          margin-top: 20px;
        }

        .page-link, .page-item.active .page-link {
          color: #000 !important;
          border-color: #FF5733 !important;
        }

        .page-item.active .page-link {
          background-color: #FF5733 !important;
        }

        .add-to-cart-btn {
          display: inline-block;
          padding: 10px 20px;
          background-color: #FF5733;
          color: #fff;
          text-decoration: none;
          border-radius: 5px;
          font-size: 14px;
          font-weight: bold;
          text-align: center;
          transition: background-color 0.3s ease;
        }
      </style>

    </div>
  </div>
</div>
<!-- End Product Section -->

<!-- Start Why Choose Us Section -->
@include('livewire.home.choseus')
<!-- End Why Choose Us Section -->

<!-- Start We Help Section -->
<div class="we-help-section">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-7 mb-5 mb-lg-0">
        <div class="imgs-grid">
          <div class="grid grid-3"><img src="{{ asset('images/gymtestimg01.jpg') }}" alt="Picture of the transformed Man"></div>
          <div class="grid grid-1"><img src="{{ asset('images/gymtestimg03.jpg') }}" alt="Picture of Ahaz Fernando"></div>
        </div>
      </div>
      <div class="col-lg-5 ps-lg-5">
        <h2 class="section-title mb-4">Surprise them with a Transformation</h2>
        <p>Tired of being called fat, skinny, or nerdy? Just purchase the best supplement you feel like and hit the gym, fast-tracking your progress and burning fat.</p>
        <ul class="list-unstyled custom-list my-4">
          <li>Burn Fat Fast</li>
          <li>Build Muscle Today</li>
          <li>Look Better</li>
          <li>Change for the Better</li>
        </ul>
        <p><a href="#" class="btn">Shop Now</a></p>
      </div>
    </div>
  </div>
</div>
<!-- End We Help Section -->

<!-- Start Popular Product -->
<div class="popular-product">
			<div class="container">
				<div class="row">

					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="{{ asset('images/logosup01.png') }}" alt="Image" class="img-fluid">
							</div>
							<div class="pt-3">
								<h3>Grenade</h3>
								<p>Packing in the Protein is Priority for many but all got to do is get the grenade</p>
								<p><a href="https://www.grenade.com/">Read More</a></p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="{{ asset('images/logosup02.png') }}" alt="Image" class="img-fluid">
							</div>
							<div class="pt-3">
								<h3>Optimum Nutrition</h3>
								<p>The Supplement for you who workout everyday with consistency</p>
								<p><a href="https://www.optimumnutrition.com/en-us">Read More</a></p>
							</div>
						</div>
					</div>

					<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
						<div class="product-item-sm d-flex">
							<div class="thumbnail">
								<img src="{{ asset('images/logosup03.png') }}" alt="Image" class="img-fluid">
							</div>
							<div class="pt-3">
								<h3>Dymatize</h3>
								<p>Need some change? This will be the magical essence for your life</p>
								<p><a href="https://dymatize.com/">Read More</a></p>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
<!-- End Popular Product -->
