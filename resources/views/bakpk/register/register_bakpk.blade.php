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
                        <form class="bg-white p-4 rounded-3" action="/bakpk/register/bakpk" method="POST">
                            @csrf
                            <h2 class="text-center mb-4">Register BAKPK</h2>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" id="nama" class="form-control" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="nomorIdentitas" class="form-label">Nomor Induk Pegawai</label>
                                <input type="text" id="nomorIdentitas" class="form-control" name="nip_bakpk"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" name="email" required>
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
</body>

</html>
