<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" style="background-color: #000000 !important;" arial-label="Furni navigation bar">
    <div class="container">
        <a class="navbar-brand" href="index.html">
            <img src="{{ asset('images/mainlogov3.png') }}" alt="Flexzone Logo" style="height: 100px;">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni" style="display: flex; align-items: center; justify-content: space-between;">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0" style="display: flex; align-items: center;">
                <li><a class="nav-link" href="{{'/'}}">Home</a></li>
                <li><a class="nav-link" href="{{'/shopnow'}}">Shop</a></li>
                <li><a class="nav-link" href="{{'/aboutus'}}">About us</a></li>
                <li><a class="nav-link" href="{{url('customer_orders')}}">Order</a></li>
                <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5" style="display: flex; align-items: center;">
                @if (Route::has('login'))
                @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <input type="submit" value="logout" style="color: #FFF !important; background-color: #FF5733; padding: 5px 10px; border-radius: 5px; margin-right: 10px;">
                </form>
                <li><a class="nav-link" href="{{url('customer_cart')}}"><img src="{{ asset('images/cart.svg') }}">&nbsp;Cart</a></li></ul>
                <li style="display: flex; align-items: center;">
                @else
                    <a class="nav-link" href="{{url('/login')}}" style="color: #FFF !important; background-color: #FF5733; padding: 5px 10px; border-radius: 5px; margin-right: 10px;">
                        <img src="{{ asset('images/user.svg') }}">&nbsp;Login
                    </a>
                    <a class="nav-link" href="{{url('/register')}}" style="color: #FFF !important; background-color: #FF5733; padding: 5px 10px; border-radius: 5px;">
                    <img src="{{ asset('images/user.svg') }}">&nbsp;Register
                    </a>
                @endauth
                @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
