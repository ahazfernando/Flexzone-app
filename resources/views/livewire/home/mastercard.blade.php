<!doctype html>
<html lang="en">
<head>
  @include('livewire.home.css')
  <style type="text/css">
    h1 {
      margin-top: 50px;
    }

    .m-card_product_view {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
    }

    @media(min-width: 768px) {
      .m-card_product_view {
        flex-direction: row;
        justify-content: center;
      }
    }

    .m-card_img-box img {
      width: 100%;
      max-width: 600px;
      height: auto;
      padding: 20px;
    }

    .m-card_supp_info {
      margin-right: 0;
      margin-top: 20px;
      color: grey;
      text-align: center;
    }

    @media(min-width: 768px) {
      .m-card_supp_info {
        margin-right: 50px;
        margin-top: 0;
        text-align: left;
      }
    }
    .m-card_supp_quan {
      color: green;
      text-align: center;
      margin-top: 10px;
    }

    @media(min-width: 768px) {
      .m-card_supp_quan {
        text-align: left;
      }
    }

    .m-card_add-to-cart {
      margin-top: 20px;
      text-align: center;
    }

    .quantity-box {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-top: 20px;
      gap: 10px;
    }

    .quantity-box button {
      padding: 10px;
      width: 40px;
      height: 40px;
      font-size: 20px;
      background-color: #f0f0f0;
      border: 1px solid #ccc;
      cursor: pointer;
    }

    .quantity-box button:hover {
      background-color: #ddd;
    }

    .quantity-box input {
      width: 50px;
      height: 40px;
      font-size: 18px;
      text-align: center;
      padding: 5px;
      border: 1px solid #ccc;
    }
  </style>

  <script>
    // This handles the increments of quantity
    function updateQuantity(isIncrement) {
      let quantityInput = document.getElementById('productQuantity');
      let quantity = parseInt(quantityInput.value);

      if (isIncrement) {
        quantityInput.value = quantity + 1;
      } else {
        if (quantity > 1) {
          quantityInput.value = quantity - 1;
        }
      }
    }
  </script>
</head>

<body>
  <div class="hero_area">@include('livewire.home.header')</div>

  <div class="m-card_product_view">
    <!-- The imported imaged from the databse -->
    <div class="m-card_img-box">
      <img src="/products/{{$product->product_image}}" alt="Supplement Image">
    </div>

    <!-- Product details section -->
    <div class="m-card_details">
      <h1>{{ $product->product_name }}</h1>
      <h4>Price: LKR&nbsp;{{$product->product_price}}</h4>
      <p class="m-card_supp_info">About the Product <br>{{ $product->product_description }}</p>
      <p class="m-card_supp_quan">Available Quantity: &nbsp;{{ $product->product_quantity }}</p>
      <!-- Add to cart button -->
      <a href="{{ url('add_to_cart', $product->id) }}" class="btn btn-success m-card_add-to-cart">Add to Cart</a>
    </div>
  </div>

  @include('livewire.home.footer')
</body>
</html>
