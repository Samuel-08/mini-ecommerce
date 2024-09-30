<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Show Product</title>
  <link rel="icon" sizes="32x32" href="{{ asset('icons/favicon.ico') }}" type="image/x-icon">
  <!-- <link rel="apple-touch-icon" sizes="32x32" href="{{ asset('icons/images.png') }}"> -->
  <!-- <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icons/favicon-32x32.png') }}"> -->
  <!-- <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('icons/images.png') }}"> -->
  <!-- <link rel="manifest" href="{{ asset('icons/site.webmanifest') }}"> -->
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
  <div class="container">
    @foreach($products as $p)
    <ul class="list-group d-flex flex-column border">
      <li>Name: {{($p->name)}}</li>
      <li>
        <img src="{{ url('storage/', $p->image)}}" height="200" alt="">
      </li>
      <li>
        <form action="{{route('show_all', $p)}}" method="get">
          <button class="info" type="submit">Lihat detail</button>
        </form>
        <form action="{{route('deletings', $p)}}" method="post" id="deleteForm">
          @method('delete')
          @csrf
          <button class="danger" type="submit" id="hapus">Hapus</button>
        </form>
      </li>
    </ul>
    @endForeach()
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

      document.getElementById('hapus').addEventListener('click', function(event) {
        // Prevent the default form submission
        event.preventDefault();

        // Show confirmation dialog
        const confirmed = confirm('Yakin mau menghapus?');
        if (confirmed) {
          // Submit the form if confirmed
          document.getElementById('deleteForm').submit();
        } else {
          alert('Batal menghapus');
        }
      });

    });
  </script>
</body>

</html>
