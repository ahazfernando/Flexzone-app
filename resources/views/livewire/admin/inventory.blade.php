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
            border: 1px solid #ddd;
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

        .edit-button, .delete-button {
            border: none;
            color: white;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            cursor: pointer;
            border-radius: 4px;
        }

        .edit-button {
            background-color: #25D366;
        }

        .delete-button {
            background-color: #FF0000;
        }
    </style>
</head>
<body>
    <div class="container-scroller">
        @include('livewire.admin.navbar')
        @include('livewire.admin.header')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="table-container">
                    <table class="centered-table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Description</th>
                                <th>Product Quantity</th>
                                <th>Product Discount</th>
                                <th>Product Category</th>
                                <th>Product Image</th>
                                <th>Edit Details</th>
                                <th>Delete Product</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $item)
                            <tr>
                                <td>{{$item->product_name}}</td>
                                <td>{{$item->product_price}}</td>
                                <td>{{$item->product_description}}</td>
                                <td>{{$item->product_quantity}}</td>
                                <td>{{$item->product_discount}}</td>
                                <td>{{$item->product_category}}</td>
                                <td><img src="/products/{{$item->product_image}}" alt="Product Image" class="product-image"></td>
                                <td><a href="{{url('edit_product',$item->id)}}" class="edit-button">Edit</a></td>
                                <td><a href="{{url('del_product',$item->id)}}" class="delete-button" onclick="confirmation(event)">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.admin.footer')
</body>
</html>
