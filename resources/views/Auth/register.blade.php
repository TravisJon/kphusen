<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TCS Service - Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Background Gradien */
        body {
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-card {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
            max-width: 500px;
            width: 100%;
            max-height: 620px;
        }

        .register-header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .register-body {
            padding: 30px;
            background-color: white;
        }

        .form-control {
            border-radius: 8px;
        }

        .register-btn {
            border-radius: 8px;
            padding: 10px;
        }

        .register-footer {
            padding: 20px 0;
            text-align: center;
        }

        .register-footer a {
            text-decoration: none;
            color: #007bff;
        }

        .register-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="card register-card">

                    <!-- Header -->
                    <div class="register-header">
                        <h4>Kodok - Register</h4>
                        <p class="mb-0">Masukkan detail pribadi untuk membuat akun</p>
                    </div>

                    <!-- Form Body -->
                    <div class="register-body">
                        <form action="{{ url('/registeruser') }}" method="POST">
                            @csrf

                            <!-- Input Nama -->
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama"
                                    placeholder="Masukkan nama lengkap" required>
                            </div>

                            <!-- Input Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    placeholder="Masukkan email" required>
                            </div>

                            <!-- Input Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Masukkan password" required>
                            </div>

                            <!-- Pilih Role -->
                            <div class="mb-3">
                                <label for="role" class="form-label">Pilih Role</label>
                                <select class="form-select" name="role_id" id="role" required>
                                    @foreach ($role as $r)
                                        <option value="{{ $r->id }}">{{ $r->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Checkbox Terms and Conditions -->
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" name="terms" id="acceptTerms"
                                    required>
                                <label class="form-check-label" for="acceptTerms">
                                    Saya setuju menerima <a href="#">Syarat & Ketentuan</a>
                                </label>
                            </div>

                            <!-- Register Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary register-btn">Create Account</button>
                            </div>
                        </form>
                        <!-- Footer -->
                        <div class="register-footer">
                            <p class="small">Sudah punya akun? <a href="{{ url('/') }}">Log in di sini</a></p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
