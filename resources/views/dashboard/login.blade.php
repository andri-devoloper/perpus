<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/png" href="assets/images/favicon.png" sizes="16x16">

    <!-- Remix icon font CSS -->
    <link rel="stylesheet" href="assets/css/remixicon.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/lib/bootstrap.min.css">
    <!-- Apex Chart CSS -->
    <link rel="stylesheet" href="assets/css/lib/apexcharts.css">
    <!-- Data Table CSS -->
    <link rel="stylesheet" href="assets/css/lib/dataTables.min.css">
    <!-- Text Editor CSS -->
    <link rel="stylesheet" href="assets/css/lib/editor-katex.min.css">
    <link rel="stylesheet" href="assets/css/lib/editor.atom-one-dark.min.css">
    <link rel="stylesheet" href="assets/css/lib/editor.quill.snow.css">
    <!-- Date Picker CSS -->
    <link rel="stylesheet" href="assets/css/lib/flatpickr.min.css">
    <!-- Calendar CSS -->
    <link rel="stylesheet" href="assets/css/lib/full-calendar.css">
    <!-- Vector Map CSS -->
    <link rel="stylesheet" href="assets/css/lib/jquery-jvectormap-2.0.5.css">
    <!-- Popup CSS -->
    <link rel="stylesheet" href="assets/css/lib/magnific-popup.css">
    <!-- Slick Slider CSS -->
    <link rel="stylesheet" href="assets/css/lib/slick.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <section class="auth bg-base d-flex flex-wrap">
        <div class="auth-left d-lg-block d-none">
            <div class="d-flex align-items-center flex-column h-100 justify-content-center">
                <img src="https://i1.wp.com/lib.upnjatim.ac.id/wp-content/uploads/2024/02/WhatsApp-Image-2024-02-07-at-11.32.45-1-1-1024x768.jpeg?ssl=1"
                    alt="">
            </div>
        </div>
        <div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
            <div class="max-w-464-px mx-auto w-100">
                <div>
                    <h4 class="mb-12">Sign In to your Account</h4>
                    <p class="mb-32 text-secondary-light text-lg">Welcome back! Please enter your details.</p>
                </div>
                <form action="{{ route('login.submit') }}" method="POST">
                    @csrf
                    <div class="icon-field mb-16">
                        <span class="icon top-50 translate-middle-y">
                            <iconify-icon icon="mage:email"></iconify-icon>
                        </span>
                        <input type="email" class="form-control h-56-px bg-neutral-50 radius-12" name="email"
                            placeholder="Email"  required>
                    </div>
                    <div class="position-relative mb-20">
                        <div class="icon-field">
                            <span class="icon top-50 translate-middle-y">
                                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                            </span>
                            <input type="password" class="form-control h-56-px bg-neutral-50 radius-12"
                                id="your-password" placeholder="Password" name="password" required>
                        </div>
                        <span
                            class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light"
                            data-toggle="#your-password"></span>
                    </div>
                    <div class="d-flex justify-content-between gap-2">
                        <div class="form-check style-check d-flex align-items-center">
                            <input class="form-check-input border border-neutral-300" name="remember" type="checkbox"
                                value="1" id="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <a href="javascript:void(0)" class="text-primary-600 fw-medium">Forgot Password?</a>
                    </div>

                    <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32"
                        id="submit-button" disabled>
                        Sign In
                    </button>

                    <div class="mt-32 center-border-horizontal text-center">
                        <span class="bg-base z-1 px-4">Or sign in with</span>
                    </div>
                    <div class="mt-32 d-flex align-items-center gap-3">
                        <button type="button"
                            class="fw-semibold text-primary-light py-16 px-24 w-50 border radius-12 text-md d-flex align-items-center justify-content-center gap-12 line-height-1 bg-hover-primary-50">
                            <iconify-icon icon="ic:baseline-facebook"
                                class="text-primary-600 text-xl line-height-1"></iconify-icon>
                            Facebook
                        </button>
                        <button type="button"
                            class="fw-semibold text-primary-light py-16 px-24 w-50 border radius-12 text-md d-flex align-items-center justify-content-center gap-12 line-height-1 bg-hover-primary-50">
                            <iconify-icon icon="logos:google-icon"
                                class="text-primary-600 text-xl line-height-1"></iconify-icon>
                            Google
                        </button>
                    </div>
                    <div class="mt-32 text-center text-sm">
                        <p class="mb-0">Don’t have an account? <a href="sign-up.html"
                                class="text-primary-600 fw-semibold">Sign Up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- jQuery library JS -->
    <script src="assets/js/lib/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Apex Chart JS -->
    <script src="assets/js/lib/apexcharts.min.js"></script>
    <!-- Data Table JS -->
    <script src="assets/js/lib/dataTables.min.js"></script>
    <!-- Iconify Font JS -->
    <script src="assets/js/lib/iconify-icon.min.js"></script>
    <!-- jQuery UI JS -->
    <script src="assets/js/lib/jquery-ui.min.js"></script>
    <!-- Vector Map JS -->
    <script src="assets/js/lib/jquery-jvectormap-2.0.5.min.js"></script>
    <script src="assets/js/lib/jquery-jvectormap-world-mill-en.js"></script>
    <!-- Popup JS -->
    <script src="assets/js/lib/magnific-popup.min.js"></script>
    <!-- Slick Slider JS -->
    <script src="assets/js/lib/slick.min.js"></script>
    <!-- Main JS -->
    <script src="assets/js/app.js"></script>

    <script>
        const rememberCheckbox = document.getElementById('remember');
        const submitButton = document.getElementById('submit-button');

        rememberCheckbox.addEventListener('change', function() {
            submitButton.disabled = !this.checked;
        });
    </script>

    <script>
        function initializePasswordToggle(toggleSelector) {
            $(toggleSelector).on('click', function() {
                $(this).toggleClass("ri-eye-off-line");
                var input = $($(this).attr("data-toggle"));
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        }
        initializePasswordToggle('.toggle-password');
    </script>

</body>

</html>
