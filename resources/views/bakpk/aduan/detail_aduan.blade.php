<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SIPMA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @include('stylesheet')
</head>

<body>
    @include('bakpk.navbar')
    <div class="container-fluid py-4 mb-5">
        <div class="container">
            <h1 class="pb-3 text-center">Detail Aduan</h1>
            <div class="row">
                <div class="col-12 col-md-4">
                    <img src="{{ $aduan->aduan->berkas ? asset('berkas/' . $aduan->aduan->berkas) : asset('img/project-1.jpg') }}"
                        alt="" style="max-width: 100%; object-fit: contain;"
                        class="d-flex justify-content-center">

                </div>
                <div class="col-md-8">
                    <div class="row mb-2">
                        <label for="judulAduan" class="col-md-2 col-form-label">Judul Aduan:</label>
                        <div class="col-md-10">
                            <input type="text" id="" class="form-control"
                                value="{{ $aduan->aduan->judul_aduan }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="nama" class="col-md-2 col-form-label">Mahasiswa:</span></label>
                        <div class="col-md-10">
                            <input type="text" id="" class="form-control"
                                value="{{ $aduan->aduan->mahasiswa->nama }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="jurusanProdi" class="col-md-2 col-form-label">Jurusan/Prodi:</label>
                        <div class="col-md-10">
                            <input type="text" id="" class="form-control"
                                value="{{ $aduan->aduan->mahasiswa->jurusan }} / {{ $aduan->aduan->mahasiswa->prodi }}"
                                readonly>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="detailAduan" class="form-label">Detail Aduan:</label>
                        <textarea id="detailAduan" class="form-control" rows="4" readonly>{{ $aduan->aduan->detail_aduan }}</textarea>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="mb-2 col-md-6">
                                <label for="jenisAduan" class="form-label">Jenis Aduan:</label>
                                <input type="text" id="jenisAduan" class="form-control"
                                    value="{{ $aduan->aduan->jenis_aduan }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="levelAduan" class="py-2 form-label">
                                    Level Aduan:
                                    @if ($aduan->aduan->level_aduan !== null)
                                        <span>{{ $aduan->aduan->level_aduan }}</span>
                                    @else
                                        <span style="color: red;">Belum diatur</span>
                                    @endif
                                </label>
                                <br>
                                <label for="tanggalAduan" class="form-label">Tanggal Aduan Diterima:
                                    <span>{{ $aduan->aduan->tanggal_kirim }}</span></label>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="{{ route('bakpk.tindak_lanjut.update', $aduan->id_aduan) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="tindakLanjutAduan" class="form-label">Tindak Lanjut Aduan:</label>
                            <textarea id "tindakLanjutAduan" class="form-control" rows="5" name="tindak_lanjut">{{ $aduan->tindak_lanjut }}</textarea>
                        </div>
                </div>
            </div>
            @if ($aduan->id_solusi === null)
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">
                        {{ $aduan->tindak_lanjut !== null ? 'Edit' : 'Kirim' }} Tindak Lanjut
                    </button>
                </div>
            @endif

            </form>
        </div>
    </div>
    @include('script')
</body>

</html>
