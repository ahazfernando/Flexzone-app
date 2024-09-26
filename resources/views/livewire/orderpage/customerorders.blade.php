<!doctype html>
<html lang="en">

<head>
    @include('livewire.home.css')
    <style>
        #order-table {
            width: 100%;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-collapse: separate;
            border-spacing: 0;
        }

        #order-table thead {
            background-color: #f7f7f7;
            border-bottom: 2px solid #ddd;
        }

        #order-table th,
        #order-table td {
            padding: 12px;
            font-size: 14px;
            vertical-align: middle;
            border-bottom: 1px solid #ddd;
        }

        #order-table th {
            font-weight: bold;
            color: #333;
            text-transform: uppercase;
        }

        #order-table td {
            color: #555;
        }

        .table-image {
            width: 50px;
            height: auto;
        }

        .status {
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: 600;
            font-size: 12px;
            color: #fff;
            display: inline-block;
        }

        .status.pending {
            background-color: #f0ad4e;
        }

        .status.in-progress {
            background-color: #5bc0de;
        }

        .status.complete {
            background-color: #5cb85c;
        }

        .status.paid {
            background-color: #337ab7;
        }

        .status.unpaid {
            background-color: #d9534f;
        }

        tbody tr:hover {
            background-color: #f5f5f5;
        }

        @media (max-width: 768px) {
            #order-table {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

    <!-- Start Header/Navigation -->
    @include('livewire.home.header')
    <!-- End Header/Navigation -->

    <!-- Hero Section -->
    <div class="hero" style="background-color: black !important; padding: 20px;">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5 col-md-6 col-12">
                    <div class="intro-excerpt" style="color: white !important;">
                        <h1 style="color: #F28C28;">Your Orders</h1>
                        <p class="mb-4">We got your orders covered here... These are all the orders you have made with us.</p>
                        <p>
                            <a href="{{'/shopnow'}}" class="btn btn-secondary me-2">Shop Now</a>
                            <a href="{{'/'}}" class="btn btn-white-outline">Explore</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 col-12 text-center">
                    <img src="{{ asset('images/allimg001.png') }}" class="img-fluid" style="max-width: 100%; height: auto;">
                </div>
            </div>
        </div>
    </div>

    <!-- Order Table Section -->
    <div class="container mt-5">
        <table class="table table-hover table-responsive text-center" id="order-table">
            <thead class="thead-dark">
                <tr>
                    <th>Customer Name</th>
                    <th>Customer Address</th>
                    <th>Customer Email</th>
                    <th>Customer Phone</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product Image</th>
                    <th>Delivery Status</th>
                    <th>Payment Status</th>
                    <th>Cancel Order</th>
                </tr>
            </thead>
            <tbody>
                @foreach($purchase as $item)
                <tr>
                    <td>{{$item->cus_name}}</td>
                    <td>{{$item->cus_address}}</td>
                    <td>{{$item->cus_email}}</td>
                    <td>{{$item->cus_phone}}</td>
                    <td>{{$item->pro_name}}</td>
                    <td>{{$item->pro_price}}</td>
                    <td><img src="products/{{$item->pro_image}}" alt="The Product Image" style="width: 100px; height: auto;"></td>
                    <td>{{$item->package_status}}</td>
                    <td>{{$item->payment_status}}</td>
                    @if($item->package_status=='On Transit')
                    <td>
                        <a onclick="confirmation(event)" href="{{url('/cancel',$item->id)}}" style="display: inline-block; padding: 10px 20px; background-color: #FF5733; color: white; text-decoration: none; border-radius: 5px;">Cancel</a>
                    </td>
                    @else
                    <td style="color:#0047AB;">Unable to Cancel</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $purchase->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>

    <!-- Start Footer Section -->
    @include('livewire.home.footer')
    <!-- End Footer Section -->
</body>
</html>
