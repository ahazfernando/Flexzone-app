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
        <a href="{{ url('add_to_cart', $item->id) }}" style="display: inline-block; padding: 10px 20px; background-color: #FF5733; color: #fff; text-decoration: none; border-radius: 5px; font-size: 14px; font-weight: bold; text-align: center; transition: background-color 0.3s ease;">
            Add to Cart
        </a>
    </div>
</div>
@endforeach
{!! $product->withQueryString()->links('pagination::bootstrap-5') !!}