<!DOCTYPE html>
<html lang="en">
<head>
    @include('livewire.admin.css')
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            display: flex;
            flex-direction: row;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
            display: flex;
            justify-content: center;
        }

        .category-center-container {
            display: flex;
            justify-content: center;
            flex-direction: column;
            width: 100%;
            padding-top: 100px;
        }

        .category-form-container input[type="text"], 
        .category-form-container button {
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .category-form-container input[type="text"] {
            color: #000;
        }

        .category-form-container button {
            background-color: #1877F2;
            color: white;
            border: none;
        }

        .category-table {
            width: 100%;
            margin-top: 40px;
            text-align: center;
        }

        .category-table th, .category-table td {
            padding: 12px;
            border: 1px solid #ddd;
        }

        .category-table th {
            background-color: #34B7F1;
            color: white;
        }

        .edit-btn, .delete-btn {
            padding: 8px 16px;
            border-radius: 5px;
            color: white;
            font-weight: bold;
        }

        .edit-btn {
            background-color: #25D366;
        }

        .delete-btn {
            background-color: #FF0000;
        }
    </style>

</head>
<body>

    <div class="sidebar">
        @include('livewire.admin.navbar')
    </div>

    <div class="main-content">
        @include('livewire.admin.header')

        <form action="{{ url('/store_category') }}" method="POST">
            @csrf
            <div class="category-center-container">
                <h1 class="category-heading">Add Product Category</h1>
                <div class="category-form-container">
                    <input type="text" name="category_name" placeholder="Enter product category">
                    <button type="submit">Add Category</button>
                </div>

                <div class="category-table-container">
                    <table class="category-table">
                        <thead>
                            <tr>
                                <th>Product Category</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category as $product_type)
                            <tr>
                                <td>{{ $product_type->category_name }}</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                                <td><a onclick="confirmation(event)" href="{{url('category_delbtn', $product_type->id)}}" class="delete-btn">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </form>

        @include('livewire.admin.footer')
    </div>

</body>
</html>
