@include('includes.header')
<main>
    <div class="container" style="padding-top: 80px; margin-top: 20px;"> <!-- Menambahkan padding-top untuk menghindari tumpang tindih dengan navbar -->
        <div class="row">
            <div class="col-lg-4 text-center">
                <div class="profile-container">
                    <img src="https://via.placeholder.com/150" alt="Profile Picture" class="profile-pic">
                    <label for="file-input" class="change-photo-btn">
                        <img src="https://img.icons8.com/ios-glyphs/30/000000/plus-math.png" alt="Change Photo">
                    </label>
                    <input id="file-input" type="file" class="hidden-input" accept="image/*">
                </div>

                <!-- Edit Button -->
                <div class="mt-3">
                    <button id="edit-profile" class="btn btn-link edit-icon" style="display: block; margin: 0 auto;">
                        <img src="https://img.icons8.com/ios-glyphs/20/000000/pencil--v1.png" alt="Edit Icon" style="margin-right: 5px;"> 
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
    /* Internal CSS to handle profile image appearance */
    .profile-pic {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        position: relative;
        object-fit: cover;
    }
    .profile-container {
        position: relative;
        display: inline-block;
    }
    .change-photo-btn {
        position: absolute;
        bottom: 0;
        right: 0;
        background-color: white;
        border-radius: 50%;
        padding: 5px;
        width: 30px;
        height: 30px;
    }
    .edit-icon {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .hidden-input {
        display: none;
    }
</style>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        const editBtn = document.getElementById('edit-profile');
        const inputs = document.querySelectorAll('#profile-form input, #profile-form textarea');
        const saveBtn = document.getElementById('save-btn');
        const cancelBtn = document.getElementById('cancel-btn');

        // Enable form inputs for editing
        editBtn.addEventListener('click', () => {
            inputs.forEach(input => input.disabled = false);
            saveBtn.disabled = false;
            cancelBtn.disabled = false;
        });

        // Reset form on cancel
        cancelBtn.addEventListener('click', () => {
            inputs.forEach(input => input.disabled = true);
            saveBtn.disabled = true;
            cancelBtn.disabled = true;
        });

        // Mock save action
        saveBtn.addEventListener('click', () => {
            alert('Profile saved successfully!');
            inputs.forEach(input => input.disabled = true);
            saveBtn.disabled = true;
            cancelBtn.disabled = true;
        });

        // Change photo functionality
        // Change photo functionality
document.getElementById('file-input').addEventListener('change', function (event) {
    const reader = new FileReader();
    reader.onload = function () {
        // Update the profile picture on the profile page
        document.querySelector('.profile-pic').src = reader.result;
        // Update the profile picture in the navbar
        document.querySelector('.profile-img').src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
});

    </script>
</main>
@include('includes.footer')