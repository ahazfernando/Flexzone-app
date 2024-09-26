<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('livewire.admin.css')
    <style>
        .addp-container-wrapper {
            display: flex;
            max-width: 1200px;
            margin: 50px auto;
            gap: 30px;
            align-items: flex-start;
        }

        .addp-container {
            flex: 1;
            max-width: 600px;
            padding: 30px;
            background-color: transparent;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }

        .addp-heading {
            text-align: center;
            font-size: 26px;
            font-weight: bold;
            margin-bottom: 30px;
            color: #fff;
        }

        .addp-form-group {
            margin-bottom: 20px;
        }

        .addp-label {
            display: block;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #fff;
        }

        .addp-input, 
        .addp-textarea, 
        .addp-select {
            width: 100%;
            padding: 12px;
            font-size: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fff;
            color: #000;
            box-sizing: border-box;
        }

        .addp-textarea {
            height: 120px;
            resize: vertical;
        }

        .addp-button {
            display: inline-block;
            padding: 12px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            width: 100%;
        }

        .addp-button:hover {
            background-color: #218838;
        }

        .addp-image {
            max-width: 600px;
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 10px;
        }

        .addp-form-footer {
            text-align: right;
            margin-top: 20px;
        }

        .container-fluid.page-body-wrapper {
            padding-top: 60px;
            padding-bottom: 60px;
        }

        .addp-form-row {
            display: flex;
            gap: 20px;
        }

        @media (max-width: 768px) {
            .addp-container-wrapper {
                flex-direction: column;
                gap: 20px;
            }

            .addp-heading {
                font-size: 22px;
            }

            .addp-form-row {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        @include('livewire.admin.navbar')

        <div class="container-fluid page-body-wrapper">
            @include('livewire.admin.header')

            <div class="addp-container-wrapper">
                <img src="/products/{{$product->product_image}}" alt="Picture of the current image" class="addp-image">

                <div class="addp-container">
                    <h2 class="addp-heading">Edit Product</h2>

                    <form action="{{url('/update_product',$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="addp-form-group">
                            <label class="addp-label" for="product_name">Product Name</label>
                            <input type="text" id="product_name" name="product_name" class="addp-input" value="{{$product->product_name}}">
                        </div>

                        <div class="addp-form-row">
                            <div class="addp-form-group">
                                <label class="addp-label" for="product_price">Product Price</label>
                                <input type="text" id="product_price" name="product_price" class="addp-input" value="{{$product->product_price}}">
                            </div>

                            <div class="addp-form-group">
                                <label class="addp-label" for="product_discount">Product Discount</label>
                                <input type="text" id="product_discount" name="product_discount" class="addp-input" value="{{$product->product_discount}}">
                            </div>
                        </div>

                        <div class="addp-form-row">
                            <div class="addp-form-group">
                                <label class="addp-label" for="product_quantity">Product Quantity</label>
                                <input type="number" id="product_quantity" name="product_quantity" class="addp-input" value="{{$product->product_quantity}}">
                            </div>
                        </div>

                        <div class="addp-form-row">
                            <div class="addp-form-group">
                                <label class="addp-label" for="product_category">Product Category</label>
                                <select name="product_category" class="addp-select">
                                    <option value="{{$product->product_category}}">{{$product->product_category}}</option>
                                    @foreach($category as $items)
                                        <option value="{{$items->category_name}}">{{$items->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="addp-form-group">
                            <label class="addp-label" for="product_description">Product Description</label>
                            <textarea id="product_description" name="product_description" class="addp-textarea">{{$product->product_description}}</textarea>
                        </div>

                        <div class="addp-form-group">
                            <label class="addp-label" for="product_image">Update Product Image</label>
                            <input type="file" id="product_image" name="product_image" class="addp-image-input">
                        </div>

                        <div class="addp-form-footer">
                            <button type="submit" class="addp-button">Update</button>
                        </div>
                    </form>
                </div>
            </div>

            @include('livewire.admin.footer')
        </div>
    </div>
</body>
</html>
