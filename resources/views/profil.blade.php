<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SIPMA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    @include('stylesheet')
</head>

<body>
    @php
        $excludeSpinner = true; // Set this variable to true to exclude the spinner
    @endphp
    @include('navbar')
    @if (Session::has('flash_message'))
        <div class="alert alert-success">
            {{ session('flash_message') }}
        </div>
    @endif
    <section>
        <div class="card-profil">
            <div class="text-atas">
                <h1>PROFIL LENGKAP</h1>
                <table>
                    <tr>
                        <td style="width: 600px;"><img src="img/foto.jpg" alt="Default"></td>
                        <td style="width: 700px;">
                            <div class="Bio">
                                <p>Nama</p>
                                <input class="profil-ket" name="first" type="text" value="{{ $mahasiswa->nama }}"
                                    disabled>
                                <p>NIM</p>
                                <input class="profil-ket" name="first" type="text" value="{{ $mahasiswa->nim }}"
                                    disabled>
                                <p>Jurusan</p>
                                <input class="profil-ket" name="first" type="text"
                                    value="{{ $mahasiswa->jurusan }}" disabled>
                                <p>Prodi</p>
                                <input class="profil-ket" name="first" type="text" value="{{ $mahasiswa->prodi }}"
                                    disabled>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
</body>

</html>
