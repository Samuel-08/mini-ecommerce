<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$product->name}}</title>
    <link rel="icon" sizes="32x32" href="{{ asset('icons/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="container bg-secondary">
    <nav class="navbar mb-3">
        <div class="navbar-brand">Admin Dashboard</div>
        <ul class="navbar-nav">
            <li><a href="/">Home</a></li>
            <li><a href="{{ route('store_product') }}">Add Product</a></li>
            <li><a href="{{route('index_product')}}">Product</a></li>
            <li>
                <div class="dropdown">
                    <a href="#">Settings</a>
                    <div class="dropdown-content">
                        <a href="{{route('index_order')}}">Order</a>
                        <a href="{{route('show_cart')}}">Cart</a>
                        <a href="{{route('show_profile')}}">Profile</a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>

    <form action="{{ route('updatings', $product) }}" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" value="{{$product->name}}">
        <label for="description">Description</label>
        <input type="text" name="description" value="{{$product->description}}">
        <label for="price">Price</label>
        <input type="number" name="price" value="{{$product->price}}">
        <label for="stock">Stock</label>
        <input type="number" name="stock" value="{{$product->stock}}">
        <label for="image">Image Upload</label>
        <input type="file" name="image" value="{{$product->stock}}">
        <button type="submit" class="success"> Simpat Edit
        </button>
    </form>
    <script>
        // DOMContentLoaded memastikan script berjalan setelah halaman siap
        document.addEventListener('DOMContentLoaded', function() {
            // Simpan title asli untuk dikembalikan saat halaman aktif
            const originalTitle = document.title;

            // BOM: Deteksi visibilitas halaman menggunakan Page Visibility API
            document.addEventListener('visibilitychange', function() {
                if (document.hidden) {
                    // Ketika pengguna berpindah ke tab lain
                    document.title = 'Hei! Jangan lupa kembali ke sini 😢';
                } else {
                    // Ketika pengguna kembali ke tab ini
                    document.title = originalTitle;
                }
            });
        });
    </script>
</body>

</html>
