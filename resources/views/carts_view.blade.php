<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>carts</title>
    <!-- Memuat file CSS dari public/css/style.css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" sizes="32x32" href="{{ asset('icons/favicon.ico') }}" type="image/x-icon">
</head>

<body class="container" id="boddy">
    <nav class="navbar">
        <div class="navbar-brand">Admin Dashboard</div>
        <ul class="navbar-nav">
            <li><a href="/">Home</a></li>
            <li><a href="{{route('store_product')}}">Add Product</a></li>
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
    @if($errors->any())
    <meta http-equiv="refresh" content="3">
    @foreach($errors->all() as $error)
    <span class="alert alert-error">{{$error}}</span>
    @endforeach
    @endif
    @php
    $total_price = 0;
    @endphp
    <div class="d-flex flex-wrap p-3 justify-content-center">
        <ul>
            @foreach($carts as $c)
            <li class="list-group-item">
                <img src="{{ asset('storage/' . $c->product->image) }}" alt=" " height="200">
            </li>
            <li class="list-group-item">Nama: {{ $c->product->name }}</li>
            <li class="list-group-item">Amount: {{ $c->amount }}</li>
            <li class="list-group-item">
                @php
                $total_price += $c->product->price * $c->amount;
                @endphp
                @endforeach
                <p>Total: Rp.{{$total_price}}</p>
            </li>
            <li class="list-group-item">
                <form action="{{route('update_cart', $c)}}" method="post">
                    @method('patch')
                    @csrf
                    <input type="number" name="amount" value="{{$c->amount}}">
                    <button type="submit" class="warning">update amount</button>
                </form>
                <form action="{{route('delete_cart', $c)}}" method="post">
                    @method('delete')
                    @csrf
                    <button class="danger" type="submit">Delete</button>
                </form>
            </li>

            <form action="{{route('checkout')}}" method="post" id="checkoutForm">
                @csrf
                <button type="submit" id="cekout" class="primary">Checkout</button>
            </form>
        </ul>
    </div>
    <script>
    // DOMContentLoaded memastikan script berjalan setelah halaman siap
    document.addEventListener('DOMContentLoaded', function() {
        // Simpan title asli untuk dikembalikan saat halaman aktif
        const originalTitle = document.title;

        // Cek apakah tombol checkout ada
        const checkoutForm = document.getElementById('checkoutForm'); // Menggunakan ID untuk menangkap form
        const checkoutButton = document.getElementById('cekout');
        if (checkoutForm && checkoutButton) {
            checkoutForm.addEventListener('submit', function() {
                // Menonaktifkan tombol dan menyembunyikannya segera setelah form disubmit
                checkoutButton.type = 'hidden';
                checkoutButton.disabled = true;
                checkoutButton.style.display = 'none';
                checkoutButton.textContent = 'Processing...';
                checkoutButton.remove(); // Menghapus tombol checkout dari DOM
                checkoutButton.classList.toggle('alert-error');
            });
        }
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