<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body style="position: relative; 
        width: 100%;
        min-height: 100vh;
        background-image: url('https://rs-jih.co.id/assets/bridge/img/bg-intro-2.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;">
    
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1050;" id="toast-container">
        @if($errors->any())
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
                <div class="toast-header bg-danger text-white">
                    <strong class="me-auto">Error</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body bg-danger text-white">
                    @foreach($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <nav class="navbar navbar-light" style="background-color: transparent;">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" height="70">
            </a>
        </div>
    </nav>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="row align-items-center w-100">
            <div class="col-lg-6 text-center">
                <img src="{{ asset('img/header-img.png') }}" alt="header-img" class="img-fluid">
            </div>
            <div class="col-lg-6">
                <div class="card p-4">
                    <h2 class="text-center">Selamat Datang</h2>
                    <p class="text-center">Register</p>
                    <form id="register-form" action="{{ route('pengguna.register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="fullname" name="nama_lengkap" 
                                   placeholder="Masukkan nama lengkap" 
                                   value="{{ old('nama_lengkap') }}">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" 
                                   placeholder="Masukkan username" 
                                   value="{{ old('username') }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email" 
                                   placeholder="Masukkan email" 
                                   value="{{ old('email') }}">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="phone" name="no_telp" 
                                       placeholder="Masukkan no telepon" 
                                       value="{{ old('no_telp') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="birthdate" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="birthdate" name="tanggal_lahir" 
                                       value="{{ old('tanggal_lahir') }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="address" name="alamat" 
                                   placeholder="Masukkan alamat" 
                                   value="{{ old('alamat') }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" 
                                   placeholder="Masukkan password">
                        </div>
                        <button type="submit" class="btn btn-warning w-100" style="background-color: #FFD700; color: #004080;">Register</button>
                    </form>
                    <p class="text-center mt-3">Sudah punya akun? <a href="/login">Login</a></p>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
    $(document).ready(function() {
        $('#register-form').on('submit', function(e) {
            e.preventDefault();
            $('#toast-container .toast').remove();
            
            var form = $(this);
            var url = form.attr('action');
            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    var successToast = `
                        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
                            <div class="toast-header bg-success text-white">
                                <strong class="me-auto">Sukses</strong>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                            <div class="toast-body bg-success text-white">
                                ${response.message}
                            </div>
                        </div>
                    `;
                    
                    $('#toast-container').append(successToast);
                    var toastElList = [].slice.call(document.querySelectorAll('.toast'));
                    var toastList = toastElList.map(function(toastEl) {
                        return new bootstrap.Toast(toastEl);
                    });
                    toastList.forEach(toast => toast.show());
                    setTimeout(function() {
                        window.location.href = '/login';
                    }, 2000);
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        var errorHtml = '';
                        
                        $.each(errors, function(field, messages) {
                            $.each(messages, function(index, message) {
                                errorHtml += message + '<br>';
                            });
                        });
                        var toastHtml = `
                            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
                                <div class="toast-header bg-danger text-white">
                                    <strong class="me-auto">Error</strong>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                                </div>
                                <div class="toast-body bg-danger text-white">
                                    ${ errorHtml}
                                </div>
                            </div>
                        `;
                        $('#toast-container').append(toastHtml);
                        var toastElList = [].slice.call(document.querySelectorAll('.toast'));
                        var toastList = toastElList.map(function(toastEl) {
                            return new bootstrap.Toast(toastEl);
                        });
                        toastList.forEach(toast => toast.show());
                    }
                }
            });
        });
    });
</script>
</body>
</html>