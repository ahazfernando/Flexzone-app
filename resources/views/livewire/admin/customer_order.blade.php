<!DOCTYPE html>
<html lang="en">
<head>
    @include('livewire.admin.css')
    <style>
        .table-container {
            display: flex;
            justify-content: center;
            margin: auto;
        }

        .centered-table {
            border-collapse: collapse;
            width: 100%;
            max-width: 1200px;
        }

        .centered-table th, .centered-table td {
            padding: 8px;
            text-align: center;
        }

        .centered-table th {
            background-color: #25D366;
            font-weight: bold;
            color: white;
        }

        .centered-table td {
            background-color: #fff;
            color: #000;
        }

        .product-image {
            max-width: 100px;
            height: auto;
        }

        h1 {
            font-size: 32px;
            text-align: center;
            color: #000;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container-scroller">
        <!-- Start Admin NavBar-->
        @include('livewire.admin.navbar')
        <!-- Start Admin NavBar -->
        <div class="container-fluid page-body-wrapper">
            <!-- Start Admin Upper NavBar -->
            @include('livewire.admin.header')
            <!-- End Admin Upper NavBar -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <h1>Customer Orders :: All</h1>
                    <div class="table-container">
                        <table class="centered-table">
                            <thead>
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
                                    <th>Delivered</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach($order as $purchase)
                                <tr>
                                    <td>{{$purchase->cus_name}}</td>
                                    <td>{{$purchase->cus_address}}</td>
                                    <td>{{$purchase->cus_email}}</td>
                                    <td>{{$purchase->cus_phone}}</td>
                                    <td>{{$purchase->pro_name}}</td>
                                    <td>{{$purchase->pro_price}}</td>
                                    <td>
                                        <img src="{{ asset('products/' . $purchase->pro_image) }}" alt="Product Image" class="product-image">
                                    </td>
                                    <td>{{$purchase->package_status}}</td>
                                    <td>{{$purchase->payment_status}}</td>
                                    <td>
                                        @if($purchase->package_status != 'Successfully Delivered')
                                            <a onclick="confirmation(event)" href="{{ url('order_status', $purchase->id) }}" style="background-color: #0047AB; color: white; font-weight: bold; border-radius: 8px; padding: 10px 20px;">
                                            Delivered</a>
                                        @else
                                            <p>Delivered</p>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="pagination-container">
                    {{ $order->links() }}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.admin.footer')
</body>
</html>
