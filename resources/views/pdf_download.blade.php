<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SIPMA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Favicon -->
    <link href="{{ public_path('img/favicon.ico') }}" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Saira:wght@500;600;700&display=swap"
        rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    {{-- <link href="{{ public_path('css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    <!-- Template Stylesheet -->
    <link href="{{ public_path('css/style.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        table tr td,
        table tr th {
            font-size: 11pt;
            font-family: 'Poppins', sans-serif;
        }

        h3 {
            font-family: 'Poppins', sans-serif;
        }
    </style>

</head>

<body>
    <div class="container">
        <div style="text-align: center">
            <h3>Laporan Aduan</h3>
            {{-- <img src="{{ $aduan->aduan->berkas ? public_path('berkas/' . $aduan->aduan->berkas) : public_path('img/project-1.jpg') }}"
                alt="" style="max-width: 100%; object-fit: contain; max-height:300px" class="img-fluid"> --}}
        </div>
        <div class="row">
            <table class="table table-striped">
                <tr>
                    <td>Judul Aduan</td>
                    <td>{{ $aduan->aduan->judul_aduan }}</td>
                </tr>
                <tr>
                    <td>Detail Aduan</td>
                    <td>{{ $aduan->aduan->detail_aduan }}</td>
                </tr>
                <tr>
                    <td>Mahasiswa</td>
                    <td>{{ $aduan->aduan->mahasiswa->nama }}</td>
                </tr>
                <tr>
                    <td>Jurusan</td>
                    <td>{{ $aduan->aduan->mahasiswa->jurusan }}</td>
                </tr>
                <tr>
                    <td>Prodi</td>
                    <td>{{ $aduan->aduan->mahasiswa->prodi }}</td>
                </tr>
                <tr>
                    <td>Jenis Aduan</td>
                    <td>{{ $aduan->aduan->jenis_aduan }}</td>
                </tr>
                <tr>
                    <td>Level Aduan</td>
                    <td>
                        @if ($aduan->aduan->level_aduan !== null)
                            <span>{{ $aduan->aduan->level_aduan }}</span>
                        @else
                            <span style="color: red;">Belum diatur</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Aduan Diterima</td>
                    <td>{{ $aduan->aduan->tanggal_kirim }}</td>
                </tr>
                <tr>
                    <td>BAKPK</td>
                    <td>{{ $aduan->bakpk->nama }}</td>
                </tr>
                <tr>
                    <td>Tindak Lanjut</td>
                    <td>{{ $aduan->tindak_lanjut }}</td>
                </tr>
                <tr>
                    <td>Pimpinan Kampus</td>
                    <td>{{ $aduan->solusi->pimpinan_kampus->nama }}</td>
                </tr>
                <tr>
                    <td>Solusi</td>
                    <td>{{ $aduan->solusi->solusi }}</td>
                </tr>
                <tr>
                    <td>Tanggal Solusi</td>
                    <td>{{ $aduan->solusi->tanggal_solusi }}</td>
                </tr>
            </table>
        </div>
    </div>
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Template Javascript -->
    <script src="{{ public_path('js/main.js') }}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>
