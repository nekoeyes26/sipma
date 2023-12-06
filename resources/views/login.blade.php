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
    @if (Session::has('gagal_login'))
        <div class="alert alert-danger">
            {{ session('gagal_login') }}
        </div>
    @endif
    <div class="py-5 login-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay=".5s">
                    <div class="p-5 rounded contact-form">
                        <form class="bg-white p-4 rounded-3" action="/login" method="POST">
                            @csrf
                            <h2 class="text-center mb-4">Login Mahasiswa</h2>
                            <div class="mb-3">
                                <label for="user_id" class="form-label">NIM</label>
                                <input type="text" class="form-control" id="user_id" placeholder="Enter your NIM"
                                    name="nim" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password"
                                        placeholder="Enter your password" name="password" required>
                                    <button class="btn btn-outline-secondary" type="button"
                                        id="showPassword">Show</button>
                                </div>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember me</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
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
    </script>
</body>

</html>
