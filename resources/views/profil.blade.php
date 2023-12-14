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
    <section>
        <div class="card-profil">
          <div class="text-atas">
            <h1>PROFIL LENGKAP</h1>
            <table>
              <tr>
                <td  style="width: 600px;"><img src="assets/img/foto.jpg" alt="Default"></td>
                <td  style="width: 700px;">
                  <div class="Bio">
                    <p>Nama</p>
                    <input class="profil-ket" name="first" type="text" value="Ardhilla Eka" disabled>
                    <p>NIM</p>
                    <input class="profil-ket" name="first" type="text" value="4.33.2.1.04" disabled>
                    <p>Jurusan</p>
                    <input class="profil-ket" name="first" type="text" value="Teknik Elektro" disabled>
                    <p>Prodi</p>
                    <input class="profil-ket" name="first" type="text" value="Teknologi Rekayasa Komputer" disabled>
                  </div>
                </td>
              </tr>
            </table>
          </div>
        </div>
      </section>
</body>
</html>
