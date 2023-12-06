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
    <!-- Register Form Section -->
    <div class="py-2 register-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay=".5s">
                    <div class="p-5 rounded contact-form">
                        <form class="bg-white p-4 rounded-3" action="/bakpk/register/mahasiswa" method="POST">
                            @csrf
                            <h2 class="text-center mb-4">Daftarkan Mahasiswa</h2>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" id="nama" class="form-control" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="nomorIdentitas" class="form-label">NIM</label>
                                <input type="text" id="nomorIdentitas" class="form-control" name="nim" required>
                            </div>
                            <div class="mb-3">
                                <label for="jurusan" class="form-label">Jurusan</label>
                                <select id="jurusan" class="form-select" name="jurusan" required>
                                    <option value="">Pilih Jurusan</option>
                                    <option value="Teknik Sipil">Teknik Sipil</option>
                                    <option value="Teknik Mesin">Teknik Mesin</option>
                                    <option value="Teknik Elektro">Teknik Elektro</option>
                                    <option value="Akutansi">Akutansi</option>
                                    <option value="Administrasi Bisnis">Administrasi Bisnis</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="programStudi" class="form-label">Program Studi</label>
                                <select id="prodi" class="form-select" name="prodi" required disabled>
                                    <option value="">Pilih Program Studi</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tahunMasuk" class="form-label">Tahun Masuk</label>
                                <select id="tahunMasuk" class="form-select" name="tahun_masuk" required>
                                    <option value="">Pilih Tahun Masuk</option>
                                    @php
                                        $currentYear = now()->year;
                                        $startYear = $currentYear - 10;
                                    @endphp

                                    @for ($year = $currentYear; $year >= $startYear; $year--)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                    <button class="btn btn-outline-secondary" type="button"
                                        id="showPassword">Show</button>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="konfirmasiPassword" class="form-label">Konfirmasi Password</label>
                                <div class="input-group">
                                    <input type="password" id="konfirmasiPassword" class="form-control"
                                        name="konfirmasi_password" required>
                                    <button class="btn btn-outline-secondary" type="button"
                                        id="showConfirmPassword">Show</button>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('script')
    <script>
        // Toggle password visibility
        const passwordInput = document.getElementById("password");
        const showPasswordButton = document.getElementById("showPassword");
        showPasswordButton.addEventListener("click", function() {
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showPasswordButton.textContent = "Hide";
            } else {
                passwordInput.type = "password";
                showPasswordButton.textContent = "Show";
            }
        });

        // Toggle password visibility
        const confirmPasswordInput = document.getElementById("konfirmasiPassword");
        const showConfirmPasswordButton = document.getElementById("showConfirmPassword");
        showConfirmPasswordButton.addEventListener("click", function() {
            if (confirmPasswordInput.type === "password") {
                confirmPasswordInput.type = "text";
                showConfirmPasswordButton.textContent = "Hide";
            } else {
                confirmPasswordInput.type = "password";
                showConfirmPasswordButton.textContent = "Show";
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Select the form and relevant input fields
            var form = document.querySelector('form');
            var passwordInput = document.getElementById('password');
            var confirmInput = document.getElementById('konfirmasiPassword');
            var submitButton = document.querySelector('button[type="submit"]');

            // Function to enable/disable the submit button based on password match
            function toggleSubmitButton() {
                if (passwordInput.value === confirmInput.value) {
                    submitButton.removeAttribute('disabled');
                } else {
                    submitButton.setAttribute('disabled', 'true');
                }
            }

            // Add event listeners to password and confirm password fields
            passwordInput.addEventListener('input', toggleSubmitButton);
            confirmInput.addEventListener('input', toggleSubmitButton);

            // Add event listener to form for final check before submission
            form.addEventListener('submit', function(event) {
                if (passwordInput.value !== confirmInput.value) {
                    alert('Password and Confirmation Password do not match.');
                    event.preventDefault(); // Prevent form submission
                }
            });
        });
    </script>
    <!-- JavaScript untuk menangani perubahan pada dropdown jurusan -->
    <script>
        $(document).ready(function() {
            // Ketika dropdown jurusan berubah
            $('#jurusan').change(function() {
                // Mendapatkan nilai jurusan yang dipilih
                var selectedJurusan = $(this).val();

                // Mengosongkan dan menonaktifkan dropdown prodi
                $('#prodi').empty().append('<option value="">Pilih Prodi</option>').prop('disabled', true);

                // Cek apakah jurusan dipilih
                if (selectedJurusan !== '') {
                    // Menentukan prodi sesuai dengan jurusan yang dipilih
                    var prodiOptions = getProdiOptions(selectedJurusan);

                    // Mengisi dropdown prodi dan mengaktifkannya
                    $('#prodi').append(prodiOptions).prop('disabled', false);
                }
            });

            // Fungsi untuk mendapatkan opsi prodi berdasarkan jurusan
            function getProdiOptions(jurusan) {
                switch (jurusan) {
                    case 'Teknik Sipil':
                        return '<option value="D3 Teknik Konstruksi Gedung">D3 Teknik Konstruksi Gedung</option>' +
                            '<option value="D3 Teknik Konstruksi Sipil">D3 Teknik Konstruksi Sipil</option>' +
                            '<option value="D4 Teknik Perawatan dan Perbaikan Gedung">D4 Teknik Perawatan dan Perbaikan Gedung</option>' +
                            '<option value="D4 Teknik Perancangan Jalan dan Jembatan">D4 Teknik Perancangan Jalan dan Jembatan</option>';
                    case 'Teknik Mesin':
                        return '<option value="D3 Teknik Mesin">D3 Teknik Mesin</option>' +
                            '<option value="D3 Teknik Konversi Energi">D3 Teknik Konversi Energi</option>' +
                            '<option value="D4 Teknik Mesin Produksi dan Perawatan">D4 Teknik Mesin Produksi dan Perawatan</option>' +
                            '<option value="D4 Teknologi Rekayasa Pembangkit Listrik">D4 Teknologi Rekayasa Pembangkit Listrik</option>';
                    case 'Teknik Elektro':
                        return '<option value="D3 Teknik Listrik">D3 Teknik Listrik</option>' +
                            '<option value="D3 Teknik Telekomunikasi">D3 Teknik Telekomunikasi</option>' +
                            '<option value="D3 Teknik Elektronika">D3 Teknik Elektronika</option>' +
                            '<option value="D3 Teknik Informatika">D3 Teknik Informatika</option>' +
                            '<option value="D4 Teknik Telekomunikasi">D4 Teknik Telekomunikasi</option>' +
                            '<option value="D4 Teknologi Rekayasa Instalasi Listrik">D4 Teknologi Rekayasa Instalasi Listrik</option>' +
                            '<option value="D4 Teknologi Rekayasa Komputer">D4 Teknologi Rekayasa Komputer</option>';
                    case 'Akutansi':
                        return '<option value="D3 Akutansi">D3 Akutansi</option>' +
                            '<option value="D3 Keuangan dan Perbankan">D3 Keuangan dan Perbankan</option>' +
                            '<option value="D4 Komputerisasi Akutansi">D4 Komputerisasi Akutansi</option>' +
                            '<option value="D4 Perbankan Syariah">D4 Perbankan Syariah</option>' +
                            '<option value="D4 Analisis Keuangan">D4 Analisis Keuangan</option>' +
                            '<option value="D4 Akuntansi Manajerial">D4 Akuntansi Manajerial</option>';
                    case 'Administrasi Bisnis':
                        return '<option value="D3 Administrasi Bisnis">D3 Administrasi Bisnis</option>' +
                            '<option value="D3 Manajemen Pemasaran">D3 Manajemen Pemasaran</option>' +
                            '<option value="D4 Manajemen Bisnis Internasional">D4 Manajemen Bisnis Internasional</option>' +
                            '<option value="D4 Administrasi Bisnis Terapan">D4 Administrasi Bisnis Terapan</option>';

                    default:
                        return '<option value="">Pilih Prodi</option>';
                }
            }
        });
    </script>
</body>

</html>
