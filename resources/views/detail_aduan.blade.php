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
    <div class="container-fluid py-5 mb-5">
        <div class="container">
            <h1 class="text-center">{{ Str::limit($aduan->judul_aduan, 31) }}</h1>
            <div class="row">
                <img src="{{ $aduan->berkas ? asset('berkas/' . $aduan->berkas) : asset('img/project-1.jpg') }}"
                    alt="Image" style="max-height: 300px; object-fit: contain;">
                <div class="col-12">
                    <label for="judulAduan" class="form-label">Judul Aduan:</label>
                    <input type="text" id="judulAduan" class="form-control" value="{{ $aduan->judul_aduan }}"
                        readonly>
                </div>
                <div class="col-md-6">
                    <label for="jenisAduan" class="form-label">Jenis Aduan:</label>
                    <input type="text" id="jenisAduan" class="form-control" value="{{ $aduan->jenis_aduan }}"
                        readonly>
                </div>
                <div class="col-md-6">
                    <label for="tanggalKirim" class="form-label">Tanggal Kirim Aduan:</label>
                    <input type="text" id="tanggalKirim" class="form-control" value="{{ $aduan->tanggal_kirim }}"
                        readonly>
                </div>
                <div class="col-12">
                    <label for="detailAduan" class="form-label">Detail Aduan:</label>
                    <textarea id="detailAduan" class="form-control" rows="4" readonly>{{ $aduan->detail_aduan }}</textarea>
                </div>
                <div class="col-12">
                    <label for="solusiAduan" class="form-label">Solusi Aduan:</label>
                    {{-- @if ($aduan->transaksi_aduan) --}}
                    <textarea id="solusiAduan" class="form-control" rows="4" readonly>
                        {{ optional($aduan->transaksi_aduan->first())->solusi->solusi ?? '' }}
                    </textarea>
                    {{-- @endif --}}
                </div>
                <div class="col-md-6">
                    <p class="form-label">Tanggal Solusi Diterima:
                        {{ optional(optional($aduan->transaksi_aduan->first())->solusi)->tanggal_solusi ?? '' }}
                    </p>
                    <!-- <input type="text" id="tanggalSolusi" class="form-control" value="Tanggal Solusi Diterima" readonly> -->
                </div>
            </div>
        </div>
    </div>
    @include('script')
</body>

</html>
