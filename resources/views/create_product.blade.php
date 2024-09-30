<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="icon" sizes="32x32" href="{{ asset('icons/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="container">
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-brand">Admin Dashboard</div>
        <ul class="navbar-nav">
            <li><a href="/">Home</a></li>
            <li><a href="{{ route('store_product') }}">Add Product</a></li>
            <li><a href="{{route('index_product')}}">Product</a></li>
            <li>
                <div class="dropdown">
                    <a href="#">Settings <sup class="text-danger bg-warning p-2">3</sup></a>
                    <div class="dropdown-content">
                        <a href="{{route('index_order')}}">Order</a>
                        <a href="{{route('show_cart')}}">Cart <sup class="text-danger">3</sup></a>
                        <a href="{{route('show_profile')}}">Profile</a>
                    </div>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <!-- <aside class="sidebar">
        <nav>
            <a href="#">Dashboard</a>
            <a href="#">Users</a>
            <a href="#">Orders</a>
            <a href="#">Products</a>
            <a href="#">Reports</a>
        </nav>
    </aside> -->

    <div class=" d-flex flex-wrap p-3 justify-content-center">

        <form action="{{ route('store_product')}}" method="post" enctype="multipart/form-data"
            class="form-control mt-3 p-3  align-items-center ">
            @csrf
            <label for="name"></label>
            <input class="input" type="text" name="name" placeholder="name">
            <br>
            <label for="description"></label>
            <input class="input" type="text" name="description" placeholder="description">
            <br>
            <label for="price"></label>
            <input class="input" type="number" name="price" placeholder="price">
            <br>
            <label for="stock"></label>
            <input class="input" type="number" name="stock" placeholder="stock">
            <br>
            <label for="image"></label>
            <input class="input" type="file" name="image" placeholder="image">
            <br>
            <button type="submit" class="primary">tambah produk</button>
        </form>
    </div>

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
