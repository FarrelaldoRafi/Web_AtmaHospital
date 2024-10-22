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
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='24' height='24'%3E%3Cpath fill='none' d='M0 0h24v24H0z'/%3E%3Cpath d='M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z' fill='%23000'/%3E%3C/svg%3E" alt="Profile Picture" class="profile-pic" id="profilePic">
                <label for="file-input" class="change-photo-btn" title="Change Photo" style="display: none;">
                    <i class="fas fa-plus plus-icon"></i>
                </label>
                <input id="file-input" type="file" name="profile_picture" class="hidden-input" accept="image/*" disabled>
            </div>

            <!-- Edit Button -->
            <div class="mt-1">
                <button type="button" id="edit-profile" class="btn btn-link edit-icon" style="display: block; margin: 0 auto; text-decoration: underline;">
                    <i class="fas fa-pencil-alt" style="margin-right: 5px;"></i> 
                    Edit Profil
                </button>
            </div>
        </div>

        <div class="col-lg-8">
            <form id="profile-form" action="{{ url('/profile/update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Full Name -->
                <div class="mb-3">
                    <label for="fullName" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Masukkan nama lengkap" value="{{ session('user.name') ?? '' }}" disabled>
                </div>

                <!-- Username -->
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" value="{{ session('user.username') ?? '' }}" disabled>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" value="{{ session('user.email') ?? '' }}" disabled>
                </div>

                <div class="row">
                    <!-- Phone -->
                    <div class="col-lg-6 mb-3">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Masukkan nomor telepon" value="{{ session('user.phone') ?? '' }}" disabled>
                    </div>

                    <!-- Date of Birth -->
                    <div class="col-lg-6 mb-3">
                        <label for="dob" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="dob" name="dob" value="{{ session('user.dob') ?? '' }}" disabled>
                    </div>
                </div>

                <!-- Address -->
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Masukkan alamat" disabled>{{ session('user.address') ?? '' }}</textarea>
                </div>

                <!-- Save and Cancel Buttons -->
                <div class="d-flex justify-content-end">
                    <button type="button" id="cancel-btn" class="btn btn-secondary me-2" style="display: none;">Batal</button>
                    <button type="submit" id="save-btn" class="btn btn-primary" style="display: none;">Simpan</button>
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
    .plus-icon {
        opacity: 0;
        transition: opacity 0.3s;
        font-size: 30px;
    }
    .profile-container:hover .plus-icon {
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

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

// Store initial form values
const initialValues = {};
allInputs.forEach(input => {
    initialValues[input.name] = input.value;
});
const initialProfilePic = profilePic.src;

// File input change handler
fileInput.addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            tempImageData = e.target.result;
            profilePic.src = tempImageData;
        };
        reader.readAsDataURL(file);
    }
});

// Edit button click handler
editButton.addEventListener('click', function() {
    // Enable all inputs
    allInputs.forEach(input => input.disabled = false);
    fileInput.disabled = false;
    
    // Show/hide buttons
    this.style.display = 'none';
    cancelButton.style.display = 'block';
    saveButton.style.display = 'block';
    changePhotoBtn.style.display = 'block';
});

// Cancel button click handler
cancelButton.addEventListener('click', function() {
    // Disable all inputs
    allInputs.forEach(input => {
        input.disabled = true;
        // Reset to initial values
        if (initialValues[input.name]) {
            input.value = initialValues[input.name];
        }
    });
    
    // Reset profile picture
    profilePic.src = initialProfilePic;
    tempImageData = null;
    fileInput.value = ''; // Clear file input
    fileInput.disabled = true;
    
    // Show/hide buttons
    editButton.style.display = 'block';
    this.style.display = 'none';
    saveButton.style.display = 'none';
    changePhotoBtn.style.display = 'none';
});

// Form submit handler
form.addEventListener('submit', function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    // Add the file to formData if it exists
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
            // Update profile pictures if new image was uploaded
            if (data.image_url) {
                profilePic.src = data.image_url;
                navProfileImg.src = data.image_url;
                initialProfilePic = data.image_url;
            }
            
            // Update initialValues with new form values
            allInputs.forEach(input => {
                initialValues[input.name] = input.value;
            });
            
            // Reset edit mode
            allInputs.forEach(input => input.disabled = true);
            fileInput.disabled = true;
            editButton.style.display = 'block';
            cancelButton.style.display = 'none';
            saveButton.style.display = 'none';
            changePhotoBtn.style.display = 'none';
            
            // Show success message
            alert('Profile updated successfully!');
        }
    })
});

// Initialize profile picture if exists in session
window.addEventListener('load', function() {
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