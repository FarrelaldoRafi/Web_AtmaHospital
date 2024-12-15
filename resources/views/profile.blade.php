@include('includes.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>

<main>
    <div class="container" style="padding-top: 80px; margin-top: 20px;">
        <div class="row">
            <div class="col-lg-4 text-center">
                <div class="profile-container position-relative d-inline-block">
                    <img src="{{ asset('storage/' . ($pengguna->foto_profil ?? 'profile_pictures/default.jpg')) }}" 
     alt="Profile Picture" class="profile-pic" id="profilePic">
                    <label for="file-input" class="change-photo-btn" title="Change Photo" style="display: none;">
                        <i class="fas fa-camera camera-icon"></i>
                    </label>
                    <input id="file-input" type="file" name="profile_picture" class="hidden-input" accept="image/*"
                        disabled>
                </div>

                <!-- Edit Button -->
                <div class="mt-1">
                    <button type="button" id="edit-profile" class="btn btn-link edit-icon"
                        style="display: block; margin: 0 auto; text-decoration: underline;">
                        <i class="fas fa-pencil-alt" style="margin-right: 5px;"></i>
                        Edit Profil
                    </button>
                </div>
            </div>

            <div class="col-lg-8">
                <form id="profile-form" action="{{ url('/profile/update') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- Full Name -->
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="fullName" name="fullName"
                            placeholder="Masukkan nama lengkap" value="{{ session('user.name') ?? '' }}" disabled>
                    </div>

                    <!-- Username -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Masukkan username" value="{{ session('user.username') ?? '' }}" disabled>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email"
                            value="{{ session('user.email') ?? '' }}" disabled>
                    </div>

                    <div class="row">
                        <!-- Phone -->
                        <div class="col-lg-6 mb-3">
                            <label for="phone" class="form-label">Nomor Telepon</label>
                            <input type="tel" class="form-control" id="phone" name="phone"
                                placeholder="Masukkan nomor telepon" value="{{ session('user.phone') ?? $pengguna->no_telp ?? '' }}" disabled>
                        </div>

                        <!-- Date of Birth -->
                        <div class="col-lg-6 mb-3">
                            <label for="dob" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="dob" name="dob"
                                value="{{ session('user.dob') ?? $pengguna->tanggal_lahir ?? '' }}" disabled>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea class="form-control" id="address" name="address" rows="3"
                            placeholder="Masukkan alamat" disabled>{{ session('user.address') ?? $pengguna->alamat ?? '' }}</textarea>
                    </div>

                    <!-- Save and Cancel Buttons -->
                    <div class="d-flex justify-content-end">
                        <button type="button" id="cancel-btn" class="btn btn-secondary me-2"
                            style="display: none;">Batal</button>
                        <button type="submit" id="save-btn" class="btn btn-primary"
                            style="display: none;">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .profile-pic {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #fff;
        }

        .change-photo-btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: transparent;
            border-radius: 50%;
            padding: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hidden-input {
            display: none;
        }

        .camera-icon {
            opacity: 0;
            transition: opacity 0.3s;
            font-size: 30px;
        }

        .profile-container:hover .camera-icon {
            opacity: 1;
        }

        .profile-container:hover .change-photo-btn {
            background-color: rgba(255, 255, 255, 0.5);
        }

        #edit-profile.btn-link {
            color: #0d6efd;
            text-decoration: none;
        }

        .btn-link:hover {
            text-decoration: underline;
        }

    </style>

    <script>
        let tempImageData = null;
        const form = document.getElementById('profile-form');
        const editButton = document.getElementById('edit-profile');
        const cancelButton = document.getElementById('cancel-btn');
        const saveButton = document.getElementById('save-btn');
        const fileInput = document.getElementById('file-input');
        const changePhotoBtn = document.querySelector('.change-photo-btn');
        const allInputs = form.querySelectorAll('input, textarea');
        const profilePic = document.getElementById('profilePic');
        const navProfileImg = document.getElementById('navProfileImg');
        const defaultProfilePic = 'https://cdn-icons-png.flaticon.com/512/552/552721.png';

        const initialValues = {};
        allInputs.forEach(input => {
            initialValues[input.name] = input.value;
        });
        let initialProfilePic = profilePic.src;

        fileInput.addEventListener('change', function (event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    tempImageData = e.target.result;
                    profilePic.src = tempImageData;
                };
                reader.readAsDataURL(file);
            }
        });

        editButton.addEventListener('click', function () {
            allInputs.forEach(input => input.disabled = false);
            fileInput.disabled = false;

            this.style.display = 'none';
            cancelButton.style.display = 'block';
            saveButton.style.display = 'block';
            changePhotoBtn.style.display = 'block';
        });

        cancelButton.addEventListener('click', function () {
            allInputs.forEach(input => {
                input.disabled = true;
                input.value = initialValues[input.name];
            });

            if (fileInput.value) {
                profilePic.src = defaultProfilePic;
            } else {
                profilePic.src = initialProfilePic;
            }

            fileInput.value = '';
            fileInput.disabled = true;

            editButton.style.display = 'block';
            cancelButton.style.display = 'none';
            saveButton.style.display = 'none';
            changePhotoBtn.style.display = 'none';
        });

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(this);
            if (fileInput.files[0]) {
                formData.append('profile_picture', fileInput.files[0]);
            }

            fetch('/profile/update', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        if (data.image_url) {
                            profilePic.src = data.image_url;
                            navProfileImg.src = data.image_url;
                            initialProfilePic = data.image_url;
                        }

                        allInputs.forEach(input => {
                            initialValues[input.name] = input.value;
                        });

                        allInputs.forEach(input => input.disabled = true);
                        fileInput.disabled = true;
                        editButton.style.display = 'block';
                        cancelButton.style.display = 'none';
                        saveButton.style.display = 'none';
                        changePhotoBtn.style.display = 'none';

                        alert('Profil berhasil diperbarui!');
                    } else {
                        alert('Gagal memperbarui profil. Silakan coba lagi.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat memperbarui profil.');
                });
        });

        window.addEventListener('load', function () {
            const sessionProfilePic = "{{ session('user.profile_picture') }}";
            if (sessionProfilePic) {
                const fullUrl = "{{ asset('storage') }}/" + sessionProfilePic;
                profilePic.src = fullUrl;
                navProfileImg.src = fullUrl;
                initialProfilePic = fullUrl;
            }
        });

    </script>
</main>
@include('includes.footer')
