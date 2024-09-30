<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <!-- Memuat file CSS dari public/css/style.css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" sizes="32x32" href="{{ asset('icons/favicon.ico') }}" type="image/x-icon">
</head>

<body class="container">
    <nav class="navbar">
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
        <ul>
            <li class="list-group-item">Nama: {{$product->name}} </li>
            <li class="list-group-item">Deskripsi {{$product->description}}</li>
            <li class="list-group-item">Harga: {{$product->price}}</li>
            <li class="list-group-item">Stock {{$product->stock}}</li>
            <li class="list-group-item">
                <img src=" {{url('storage/'. $product->image)}}" alt="" width="200" class="card">
            </li>
            <li class="list-group-item">
                <form action="{{route('cart_adding', $product)}}" method="post">
                    @csrf <br>
                    <label for="amount">Amount Checkout</label>
                    <input type="number" name="amount" id="amount" placeholder="1" value=1 required><br><br>
                    <button type="submit" class="btn btn-success"> add chart </button>
                </form>
            </li>
            <li class="list-group-item">
                <span class="d-flex align-item-center flex-column flex-wrap">
                    <form action="{{route('editing', $product)}}" method="get">
                        <button type="submit" class="btn btn-info"> Edit </button>
                    </form>
                    @if($errors->any())
                    <meta http-equiv="refresh" content="3">
                    @foreach($errors->all() as $error)
                    <span class="alert alert-error">{{$error}}</span>
                    @endforeach
                    @endif
                </span>
            </li>
            <li>
                <a class="btn btn-danger" href="{{ route('index_product') }}"> Kembali </a>
            </li>
        </ul>
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

            // Fungsi sanitasi untuk karakter HTML khusus
            function sanitizeInput(value) {
                // Menggantikan karakter yang berpotensi berbahaya
                return value
                    .replace(/&/g, "&amp;")
                    .replace(/</g, "&lt;")
                    .replace(/>/g, "&gt;")
                    .replace(/"/g, "&quot;")
                    .replace(/'/g, "&#039;");
            }

            document.getElementById('amount').addEventListener('input', function(e) {
                let value = e.target.value;
                // Hanya izinkan angka 0-9, desimal (opsional), dan tanda minus (untuk angka negatif)
                value = value.replace(/[^0-9.-]/g, ''); // Menghapus karakter non-numerik

                // Sanitasi input untuk karakter khusus HTML
                e.target.value = sanitizeInput(value);
            });

        });
    </script>
</body>


</html>
