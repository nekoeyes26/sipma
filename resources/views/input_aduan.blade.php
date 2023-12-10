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
            <h1 class="text-center">Form Pengaduan</h1>
            <form action="{{ route('aduan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Nama -->
                <div class="row mt-3">
                    <div class="col-md-4">
                        <label for="nama">Nama:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="nama"
                            value="{{ Auth::guard('guard2')->user()->nama }}" disabled>
                    </div>
                </div>
                <!-- NIM -->
                <div class="row mt-3">
                    <div class="col-md-4">
                        <label for="nim">NIM:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="nim"
                            value="{{ Auth::guard('guard2')->user()->nim }}" disabled>
                    </div>
                </div>
                <!-- Jenis Aduan -->
                <div class="row mt-5">
                    <div class="col-md-4">
                        <label for="jenisAduan">Jenis Aduan:</label>
                    </div>
                    <div class="col-md-8">
                        <select class="form-select" id="jenisAduan" name="jenis_aduan">
                            <option value="Akademik">Masalah Akademik</option>
                            <option value="Keuangan">Masalah Keuangan</option>
                            <option value="Sarana Prasarana">Masalah Sarana Prasarana</option>
                            <option value="Lainnya">Lainnya..</option>
                        </select>
                    </div>
                </div>
                <!-- Judul Aduan -->
                <div class="row mt-3">
                    <div class="col-md-4">
                        <label for="judulAduan">Judul Aduan:</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="judulAduan" name="judul_aduan"
                            placeholder="Masukkan judul aduan">
                    </div>
                </div>
                <!-- Detail Aduan -->
                <div class="row mt-3">
                    <div class="col-md-4">
                        <label for="detailAduan">Detail Aduan:</label>
                    </div>
                    <div class="col-md-8">
                        <textarea class="form-control" id="detailAduan" rows="5" name="detail_aduan" placeholder="Masukkan detail aduan"></textarea>
                    </div>
                </div>
                <!-- Input File -->
                <div class="row mt-3">
                    <div class="col-md-4">
                        <label for="fileAduan">Upload File:</label>
                    </div>
                    <div class="col-md-8">
                        <div class="input-group">
                            <input type="text" class="form-control" id="fileLabel" readonly>
                            <label class="input-group-btn">
                                <span class="btn btn-primary"> Browse&hellip; <input type="file" id="fileAduan"
                                        style="display: none;" name="berkas" onchange="updateFileLabel(this);">
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="row mt-5">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Kirim Aduan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @include('script')
    <script>
        function updateFileLabel(input) {
            var fileName = input.files[0].name;
            document.getElementById('fileLabel').value = fileName;
        }
    </script>
</body>

</html>
