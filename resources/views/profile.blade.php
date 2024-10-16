@include('includes.header')
<main>
<div class="container" style="padding-top: 80px; margin-top: 20px;">
        <div class="row">
            <div class="col-lg-4 text-center">
                <form action="{{ url('/profile/update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="profile-container position-relative d-inline-block">
                        <img src="{{ asset('storage/' . (session('user')['profile_picture'] ?? 'https://img.icons8.com/ios-glyphs/150/000000/user.png')) }}" alt="Profile Picture" class="profile-pic">
                        <label for="file-input" class="change-photo-btn" title="Change Photo">
                            <i class="fas fa-plus plus-icon"></i>
                        </label>
                        <input id="file-input" type="file" name="profile_picture" class="hidden-input" accept="image/*">
                    </div>
                    <!-- Save Button -->
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Save Profile Picture</button>
                    </div>
                </form>

                <!-- Edit Button -->
                <div class="mt-3">
                    <button id="edit-profile" class="btn btn-link edit-icon" style="display: block; margin: 0 auto;">
                        <i class="fas fa-pencil-alt" style="margin-right: 5px;"></i> 
                        Edit Profile
                    </button>
                </div>
            </div>

            <div class="col-lg-8">
                <form id="profile-form">
                    <!-- Full Name -->
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Enter your full name" disabled>
                    </div>

                    <!-- Username -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" placeholder="Enter your username" disabled>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" disabled>
                    </div>

                    <div class="row">
                        <!-- Phone -->
                        <div class="col-lg-6 mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" placeholder="Enter your phone number" disabled>
                        </div>

                        <!-- Date of Birth -->
                        <div class="col-lg-6 mb-3">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" disabled>
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" rows="3" placeholder="Enter your address" disabled></textarea>
                    </div>

                    <!-- Save and Cancel Buttons -->
                    <div class="d-flex justify-content-end">
                        <button type="button" id="cancel-btn" class="btn btn-secondary me-2" disabled>Cancel</button>
                        <button type="button" id="save-btn" class="btn btn-primary" disabled>Save</button>
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
        transform: translate(-50%, -50%); /* Center it vertically and horizontally */
        background-color: transparent;
        border-radius: 50%;
        padding: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        display: flex; /* Use flex to center icon */
        align-items: center; /* Align items vertically */
        justify-content: center; /* Align items horizontally */
    }
    .hidden-input {
        display: none;
    }
    .plus-icon {
        opacity: 0; /* Initially hidden */
        transition: opacity 0.3s;
        font-size: 30px; /* Adjust font size for plus icon */
    }
    .profile-container:hover .plus-icon {
        opacity: 1; /* Show on hover */
    }
    .profile-container:hover .change-photo-btn {
        background-color: rgba(255, 255, 255, 0.5); /* Light transparent background on hover */
    }
    </style>
</main>

<script>
    // JavaScript for image upload and profile editing
    document.getElementById('file-input').addEventListener('change', function (event) {
        const reader = new FileReader();
        reader.onload = function () {
            // Update the profile picture on the profile page
            document.querySelector('.profile-pic').src = reader.result;
            // Update the profile picture in the navbar
            document.querySelector('.profile-img').src = reader.result;

            // Update session storage or handle the image upload here
            // For simplicity, we're not storing in the session for now
        };
        reader.readAsDataURL(event.target.files[0]);
    });

    // On page load, check if there's a saved profile picture in session storage
    window.onload = function() {
        const savedProfilePic = sessionStorage.getItem('profile_picture');
        if (savedProfilePic) {
            document.querySelector('.profile-pic').src = savedProfilePic;
            document.querySelector('.profile-img').src = savedProfilePic;
        }
    };

    // Enable editing on click
    document.getElementById('edit-profile').addEventListener('click', function() {
        document.querySelectorAll('#profile-form input, #profile-form textarea').forEach(input => {
            input.disabled = false;
        });
        document.getElementById('cancel-btn').disabled = false;
        document.getElementById('save-btn').disabled = false;
        this.style.display = 'none'; // Hide edit button
    });

    // Cancel editing
    document.getElementById('cancel-btn').addEventListener('click', function() {
        document.querySelectorAll('#profile-form input, #profile-form textarea').forEach(input => {
            input.disabled = true;
        });
        this.disabled = true;
        document.getElementById('save-btn').disabled = true;
        document.getElementById('edit-profile').style.display = 'block'; // Show edit button
    });

    // Save edited profile (you may implement AJAX call to save the data)
    document.getElementById('save-btn').addEventListener('click', function() {
        alert('Profile saved!'); // Dummy alert; implement your saving logic here
    });
</script>