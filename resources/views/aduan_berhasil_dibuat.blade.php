<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SIPMA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @include('stylesheet')
</head>

<body>
    @include('navbar')
    @if (Session::has('flash_message'))
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
    @endif
    <div class="bg-light d-flex align-items-center text-center container-fluid"
        style="padding-top: 8%; padding-bottom: 12%;">
        <div class="container">
            <i class="fa fa-check-circle fa-7x mb-4 text-primary"></i>
            <h2 class="mb-3">Aduan Berhasil Dibuat</h2>
            <p class="mb-4">Terima kasih atas aduan yang Anda berikan. Kami akan segera menindaklanjuti.</p>
            <a href="{{ route('aduan.recent') }}" class="btn btn-primary">Lihat Detail Aduan</a>
        </div>
    </div>
    @include('script')
</body>

</html>
