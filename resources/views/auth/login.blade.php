<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.headerscript')
</head>

<body>

    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.html" class="logo d-flex align-items-center w-auto">
                                    <!-- <img src="assets/img/logo.png" alt=""> -->
                                    <span class="d-none d-lg-block">NiceAdmin</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                                    </div>
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <form class="row g-3" action="{{ route('login') }}" method="POST" autocomplete="off" id="loginForm">
                                        @csrf
                                        <div class="col-12">
                                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                            <div class="input-group has-validation">
                                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email" value="{{ old('email') }}">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit" id="loginButton">
                                                <span id="buttonText">Login</span>
                                                <span id="spinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                            </button>
                                        </div>

                                        <div class="col-12">
                                            <p class="small mb-0 text-center">Don't have account? <a href="{{ route('auth.register') }}">Create an account</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    @include('partials.footerscript')
    <script>
        document.getElementById('loginForm').addEventListener('submit', function() {
            const loginButton = document.getElementById('loginButton');
            const spinner = document.getElementById('spinner');
            const buttonText = document.getElementById('buttonText');
            loginButton.disabled = true;
            spinner.classList.remove('d-none');
            buttonText.textContent = 'Logging in...';
        });

        function reloadPageAfterAlert(id) {
            const alertElement = document.getElementById(id);
            if (alertElement) {
                setTimeout(() => {
                    alertElement.style.animation = 'fadeOut 0.6s ease-out forwards';
                    setTimeout(() => {
                        location.reload();
                    }, 500);
                }, 700);
            }
        }
        reloadPageAfterAlert('success-alert');
        reloadPageAfterAlert('error-alert');
    </script>

</body>

</html>