@extends('front.master')

@section('title', 'Influencer Albums')

@section('body')

    <!-- Main Content -->
    <div class="influencer-profile-main">
        <div class="container-fluid px-md-4 px-3 py-4 influencer-profile-shell">

            @include('front.influencer.includes.dashboard-common-sections')

            <div class="influencer-edit-content">
                <div class="row">
                    <div class="col-12">
                        <!-- Upload Profile Picture Section -->
                        <div class="profile-upload-card">
                            <h3 class="profile-upload-title">Upload Your Profile Picture</h3>
                            <div class="profile-upload-box" id="dropZone">
                                <div class="profile-avatar" id="profileAvatarContainer">
                                    @if(old('profile_image') || $loggedUser->profile_image)
                                        <img src="{{ old('profile_image') ?? asset($loggedUser->profile_image) }}"
                                             alt="Profile"
                                             class="profile-avatar-image"
                                             id="profilePreview">
                                    @else
                                        <svg class="profile-avatar-icon" id="profilePlaceholder" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="50" cy="35" r="18" fill="#79A8F3"/>
                                            <path d="M20 85C20 69 34 65 50 65C66 65 80 69 80 85" fill="#79A8F3"/>
                                        </svg>
                                    @endif
                                    <div class="upload-overlay" id="uploadOverlay">
                                        <i class="bi bi-cloud-upload"></i>
                                        <p>Drop image here or click to upload</p>
                                    </div>
                                </div>
                                <input type="file" name="profile_image" id="profileImageInput" accept="image/*" style="display: none;">
                                <button class="btn-upload" type="button" id="uploadBtn">
                                    <i class="bi bi-upload"></i> Upload
                                </button>
                                <small class="text-danger error-profile-image mt-2">@error('profile_image'){{ $message }}@enderror</small>
                            </div>
                        </div>

                        <!-- Form Fields -->
                        <form action="{{ route('influencer.update-profile') }}" method="post" id="editUserProfile">
                            @csrf
                            <input type="hidden" name="profile_image_base64" id="profileImageBase64">
                            <input type="hidden" name="user_type" value="influencer">

                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-6 mt-2">
                                            <div class="form-group">
                                                <label class="form-label-profile">Name</label>
                                                <input type="text"
                                                       name="name"
                                                       value="{{ old('name', $loggedUser->name ?? '') }}"
                                                       class="form-input-profile"
                                                       required
                                                       placeholder="Full Name">
                                                <small class="text-danger error-name">@error('name'){{ $message }}@enderror</small>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                            <div class="form-group">
                                                <label class="form-label-profile">Email</label>
                                                <input type="email"
                                                       name="email"
                                                       value="{{ old('email', $loggedUser->email ?? '') }}"
                                                       class="form-input-profile"
                                                       placeholder="Influencer Email">
                                                <small class="text-danger error-email">@error('email'){{ $message }}@enderror</small>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-2">
                                            <div class="form-group">
                                                <label class="form-label-profile">Phone</label>
                                                <input type="tel"
                                                       name="mobile"
                                                       value="{{ old('mobile', $loggedUser->mobile ?? '') }}"
                                                       class="form-input-profile"
                                                       placeholder="Influencer Mobile Numbher">
                                                <small class="text-danger error-mobile">@error('mobile'){{ $message }}@enderror</small>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-2">
                                            <div class="form-group">
                                                <label class="form-label-profile">NID</label>
                                                <input type="number"
                                                       maxlength="18"
                                                       min="0"
                                                       name="nid"
                                                       value="{{ old('nid', $loggedUser->userInfo->nid ?? '') }}"
                                                       class="form-input-profile"
                                                       placeholder="Influencer NID Number">
                                                <small class="text-danger error-nid">@error('nid'){{ $message }}@enderror</small>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-2">
                                            <div class="form-group">
                                                <label class="form-label-profile">Referral Account</label>
                                                <input type="text"
                                                       name="reffered_agent_url"
                                                       value="{{ old('reffered_agent_url', $loggedUser->reffered_agent_url ?? '') }}"
                                                       class="form-input-profile"
                                                       placeholder="">
                                                <small class="text-danger error-reffered_agent_url">@error('reffered_agent_url'){{ $message }}@enderror</small>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mt-2">
                                            <div class="form-group">
                                                <label class="form-label-profile">Bio</label>
                                                <textarea class="form-textarea-profile"
                                                          name="bio"
                                                          placeholder="">{{ old('bio', $loggedUser->userInfo->bio ?? '') }}</textarea>
                                                <small class="text-danger error-bio">@error('bio'){{ $message }}@enderror</small>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Social Media Links Section -->
                            <div class="mb-5">
                                <h6 class="fw-semibold mb-4">Social Media Links</h6>

                                <div class="row g-4">
                                    <!-- Facebook Column -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Facebook</label>
                                        <div class="position-relative mb-3">
                                            <input type="text" class="form-control influencer-social-input" placeholder="facebook.com/johndoe" name="fb_profile_link" value="{{ old('fb_profile_link', $loggedUser->fb_profile_link ?? '') }}">
                                            <span class="influencer-social-check">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15 4.5L6.75 12.75L3 9" stroke="#10B981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                        </div>
                                        <small class="text-danger error-fb_profile_link d-block mb-2"></small>
                                        <button class="btn influencer-btn-facebook w-100 mb-4 influencer-social-action">
                                            <i class="bi bi-facebook me-2"></i>
                                            Log in with Facebook
                                        </button>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Youtube -->
                                        <label class="form-label fw-semibold">Youtube</label>
                                        <div class="position-relative mb-3">
                                            <input type="text" class="form-control influencer-social-input" name="youtube_profile_link" placeholder="Youtube.com/@johndoe" value="{{ old('youtube_profile_link', $loggedUser->youtube_profile_link ?? '') }}">
                                            <span class="influencer-social-check">
                                                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15 4.5L6.75 12.75L3 9" stroke="#10B981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </span>
                                        </div>
                                        <small class="text-danger error-youtube_profile_link d-block mb-2"></small>
                                        <button class="btn influencer-btn-google w-100 influencer-social-action">
                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M18.1713 8.36791H17.5001V8.33331H10.0001V11.6666H14.7096C14.0226 13.6071 12.1763 15 10.0001 15C7.23884 15 5.00009 12.7612 5.00009 9.99998C5.00009 7.23873 7.23884 4.99998 10.0001 4.99998C11.2746 4.99998 12.4342 5.48081 13.3171 6.26623L15.6742 3.90915C14.1859 2.52248 12.1951 1.66665 10.0001 1.66665C5.39801 1.66665 1.66675 5.39791 1.66675 9.99998C1.66675 14.602 5.39801 18.3333 10.0001 18.3333C14.6021 18.3333 18.3334 14.602 18.3334 9.99998C18.3334 9.44123 18.2759 8.89581 18.1713 8.36791Z" fill="#FFC107"/>
                                                <path d="M2.62756 6.12123L5.36548 8.12915C6.10631 6.29498 7.90048 4.99998 10.0005 4.99998C11.2751 4.99998 12.4346 5.48081 13.3176 6.26623L15.6746 3.90915C14.1863 2.52248 12.1955 1.66665 10.0005 1.66665C6.79923 1.66665 3.99923 3.47373 2.62756 6.12123Z" fill="#FF3D00"/>
                                                <path d="M10.0001 18.3333C12.1526 18.3333 14.1101 17.5096 15.5876 16.17L13.0084 13.9875C12.1432 14.6452 11.0865 15.0009 10.0001 15C7.83259 15 5.99176 13.6179 5.29842 11.6891L2.58176 13.7829C3.93426 16.4816 6.76092 18.3333 10.0001 18.3333Z" fill="#4CAF50"/>
                                                <path d="M18.1713 8.36796H17.5001V8.33337H10.0001V11.6667H14.7096C14.3809 12.5902 13.7889 13.3972 13.0071 13.9879L13.0084 13.9871L15.5876 16.1696C15.4051 16.3355 18.3334 14.1667 18.3334 10C18.3334 9.44129 18.2759 8.89587 18.1713 8.36796Z" fill="#1976D2"/>
                                            </svg>
                                            Login with Google
                                        </button>
                                        <p class="small text-muted mt-2 influencer-social-action">Use your Google account that is linked with your YouTube Channel</p>
                                    </div>

                                    <!-- Instagram & TikTok Column -->
                                    <div class="col-md-6">
                                        <label class="form-label fw-semibold">Instagram</label>
                                        <div class="position-relative mb-3">
                                            <span class="influencer-social-prefix">@</span>
                                            <input type="text" class="form-control influencer-social-input influencer-social-input-prefix" placeholder="johndoe" name="insta_profile_link" value="{{ old('insta_profile_link', $loggedUser->insta_profile_link ?? '') }}">
                                        </div>
                                        <small class="text-danger error-insta_profile_link d-block mb-2"></small>
                                        <button class="btn influencer-btn-instagram w-100 mb-4 influencer-social-action">
                                            <i class="bi bi-instagram me-2"></i>
                                            Log in with Instagram
                                        </button>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- TikTok -->
                                        <label class="form-label fw-semibold">Tiktok</label>
                                        <div class="position-relative mb-3">
                                            <span class="influencer-social-prefix">@</span>
                                            <input type="text" class="form-control influencer-social-input influencer-social-input-prefix" placeholder="username or tiktok.com/@username" name="tiktalk_profile_link" value="{{ old('tiktalk_profile_link', $loggedUser->tiktalk_profile_link ?? '') }}">
                                        </div>
                                        <small class="text-danger error-tiktalk_profile_link d-block mb-2"></small>
                                        <button class="btn influencer-btn-tiktok w-100 influencer-social-action">
                                            <i class="bi bi-tiktok me-2"></i>
                                            Log in with Tiktok
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- Save Changes Button -->
                            <div class="mb-5">
                                <button class="btn btn-dark rounded-pill px-5 py-3">Save changes</button>
                            </div>
                        </form>




                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection

@push('style')
    <style>
        /* Profile Upload Styles */
        .profile-upload-box {
            position: relative;
        }

        .profile-avatar {
            position: relative;
            width: 200px;
            height: 200px;
            margin: 0 auto 20px;
            /*border-radius: 50%;*/
            overflow: hidden;
            cursor: pointer;
            transition: all 0.3s ease;
            /*border: 3px dashed #ddd;*/
        }

        .profile-avatar:hover {
            border-color: #79A8F3;
        }

        .profile-avatar.drag-over {
            border-color: #28C76F;
            background-color: rgba(40, 199, 111, 0.1);
            transform: scale(1.05);
        }

        .profile-avatar-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0%;
        }

        .profile-avatar-icon {
            width: 100%;
            height: 100%;
            padding: 20px;
        }

        .upload-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            /*border-radius: 50%;*/
            color: white;
        }

        .profile-avatar:hover .upload-overlay {
            opacity: 1;
        }

        .upload-overlay i {
            font-size: 32px;
            margin-bottom: 8px;
        }

        .upload-overlay p {
            font-size: 12px;
            text-align: center;
            padding: 0 10px;
            margin: 0;
        }

        .btn-upload {
            display: flex;
            align-items: center;
            gap: 8px;
            justify-content: center;
        }

        .error-profile-image {
            display: block;
            text-align: center;
        }
    </style>
{{--    form validation--}}
    <style>
        .is-invalid {
            border-color: #dc3545 !important;
        }

        .influencer-social-check {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
        }

        .influencer-social-prefix {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            font-weight: 500;
        }

        .influencer-social-input-prefix {
            padding-left: 35px !important;
        }

        .form-input-profile.is-invalid,
        .form-textarea-profile.is-invalid,
        .form-control.is-invalid {
            border-color: #dc3545;
            padding-right: calc(1.5em + 0.75rem);
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right calc(0.375em + 0.1875rem) center;
            background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
        }

        .text-danger {
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
    </style>
@endpush

@push('script')
    <script>
        // ========================================
        // DRAG AND DROP IMAGE UPLOAD
        // ========================================

        const dropZone = document.getElementById('dropZone');
        const profileAvatarContainer = document.getElementById('profileAvatarContainer');
        const profileImageInput = document.getElementById('profileImageInput');
        const uploadBtn = document.getElementById('uploadBtn');
        const profileImageBase64Input = document.getElementById('profileImageBase64');

        let selectedFile = null; // Store selected file globally

        // Click to upload - triggers AJAX upload
        uploadBtn.addEventListener('click', function() {
            if (selectedFile) {
                uploadImageToServer(selectedFile);
            } else {
                toastr.warning('Please select an image first');
                profileImageInput.click();
            }
        });

        profileAvatarContainer.addEventListener('click', function() {
            profileImageInput.click();
        });

        // File input change
        profileImageInput.addEventListener('change', function(e) {
            handleFiles(e.target.files);
        });

        // Prevent default drag behaviors
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, preventDefaults, false);
            document.body.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        // Highlight drop zone when dragging over
        ['dragenter', 'dragover'].forEach(eventName => {
            dropZone.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, unhighlight, false);
        });

        function highlight(e) {
            profileAvatarContainer.classList.add('drag-over');
        }

        function unhighlight(e) {
            profileAvatarContainer.classList.remove('drag-over');
        }

        // Handle dropped files
        dropZone.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            handleFiles(files);
        }

        function handleFiles(files) {
            if (files.length === 0) return;

            const file = files[0];

            // Validate file type
            if (!file.type.startsWith('image/')) {
                toastr.error('Please upload an image file');
                return;
            }

            // Validate file size (max 5MB)
            if (file.size > 5 * 1024 * 1024) {
                toastr.error('Image size should be less than 5MB');
                return;
            }

            // Store file for upload
            selectedFile = file;

            // Clear previous error
            $('.error-profile-image').text('');

            // Preview image
            const reader = new FileReader();
            reader.onload = function(e) {
                const imageData = e.target.result;

                // Update UI
                const existingImage = document.getElementById('profilePreview');
                const placeholder = document.getElementById('profilePlaceholder');

                if (existingImage) {
                    existingImage.src = imageData;
                } else {
                    if (placeholder) {
                        placeholder.remove();
                    }
                    const img = document.createElement('img');
                    img.src = imageData;
                    img.alt = 'Profile';
                    img.className = 'profile-avatar-image';
                    img.id = 'profilePreview';
                    profileAvatarContainer.insertBefore(img, profileAvatarContainer.firstChild);
                }

                // Store base64 data
                profileImageBase64Input.value = imageData;

                toastr.success('Image preview loaded. Click "Upload" to save.');
            };

            reader.onerror = function() {
                toastr.error('Failed to read image file');
            };

            reader.readAsDataURL(file);
        }

        // ========================================
        // AJAX FILE UPLOAD
        // ========================================
        function uploadImageToServer(file) {
            // Create FormData object
            const formData = new FormData();
            formData.append('profile_image', file);
            formData.append('_token', '{{ csrf_token() }}');

            // Show loading state
            uploadBtn.disabled = true;
            uploadBtn.innerHTML = '<i class="bi bi-hourglass-split"></i> Uploading...';

            // AJAX request
            $.ajax({
                url: '{{ route("influencer.profile.upload-image") }}', // Replace with your route
                type: 'POST',
                data: formData,
                processData: false, // Don't process the data
                contentType: false, // Don't set content type
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                xhr: function() {
                    // Custom XMLHttpRequest for upload progress
                    const xhr = new window.XMLHttpRequest();

                    // Upload progress
                    xhr.upload.addEventListener('progress', function(e) {
                        if (e.lengthComputable) {
                            const percentComplete = (e.loaded / e.total) * 100;
                            uploadBtn.innerHTML = `<i class="bi bi-hourglass-split"></i> ${Math.round(percentComplete)}%`;
                        }
                    }, false);

                    return xhr;
                },
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success(response.messa|| 'Image uploaded successfully');

                        // Update the image preview with the server URL if provided
                        if (response.image_url) {
                            const existingImage = document.getElementById('profilePreview');
                            if (existingImage) {
                                existingImage.src = response.image_url;
                            }
                        }

                        // Reset upload button
                        uploadBtn.disabled = false;
                        uploadBtn.innerHTML = '<i class="bi bi-upload"></i> Upload';

                        // Clear selected file
                        selectedFile = null;
                        profileImageInput.value = '';
                    } else {
                        toastr.error(response.message || 'Upload failed');
                        resetUploadButton();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Upload error:', error);

                    let errorMessage = 'Failed to upload image';

                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    } else if (xhr.responseJSON && xhr.responseJSON.errors) {
                        // Handle validation errors
                        const errors = xhr.responseJSON.errors;
                        errorMessage = Object.values(errors).flat().join(', ');
                    }

                    toastr.error(errorMessage);
                    $('.error-profile-image').text(errorMessage);

                    resetUploadButton();
                }
            });
        }

        function resetUploadButton() {
            uploadBtn.disabled = false;
            uploadBtn.innerHTML = '<i class="bi bi-upload"></i> Upload';
        }

        // ========================================
        // DYNAMIC ERROR CLEARING
        // ========================================
        $(document).on('input', 'input, textarea, select', function() {
            $(this).siblings('.text-danger').text('');
            $(this).closest('.form-group').find('.text-danger').text('');
            $(this).removeClass('is-invalid');
        });
    </script>

{{--    form validation--}}
    <script>
        $(document).ready(function() {
            // ========================================
            // VALIDATION PATTERNS
            // ========================================
            const patterns = {
                email: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                bdMobile: /^(01[3-9]\d{8})$/, // Bangladesh mobile: 01X-XXXXXXXX (11 digits)
                nid: /^\d{10}$|^\d{13}$|^\d{17}$/, // NID: 10, 13, or 17 digits
                facebook: /^(https?:\/\/)?(www\.)?(facebook\.com|fb\.com)\/.+$/i,
                youtube: /^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/.+$/i,
                instagram: /^(https?:\/\/)?(www\.)?instagram\.com\/.+$|^@?[\w](?!.*?\.{2})[\w.]{1,28}[\w]$/i,
                tiktok: /^(https?:\/\/)?(www\.)?tiktok\.com\/.+$/i
            };

            // ========================================
            // HELPER FUNCTIONS
            // ========================================

            /**
             * Show error message for a field
             */
            function showError(fieldName, message) {
                const errorElement = $(`.error-${fieldName}`);
                const inputElement = $(`[name="${fieldName}"]`);

                errorElement.text(message);
                inputElement.addClass('is-invalid');
            }

            /**
             * Clear error message for a field
             */
            function clearError(fieldName) {
                const errorElement = $(`.error-${fieldName}`);
                const inputElement = $(`[name="${fieldName}"]`);

                errorElement.text('');
                inputElement.removeClass('is-invalid');
            }

            /**
             * Validate Bangladesh mobile number
             */
            function validateBdMobile(mobile) {
                // Remove any spaces or dashes
                const cleanMobile = mobile.replace(/[\s-]/g, '');

                // Check if it matches BD mobile pattern
                if (!patterns.bdMobile.test(cleanMobile)) {
                    return {
                        valid: false,
                        message: 'Please enter a valid Bangladesh mobile number (e.g., 01712345678)'
                    };
                }

                return { valid: true };
            }

            /**
             * Validate NID number
             */
            function validateNID(nid) {
                if (!nid) return { valid: true }; // Optional field

                const cleanNID = nid.replace(/[\s-]/g, '');

                if (!patterns.nid.test(cleanNID)) {
                    return {
                        valid: false,
                        message: 'NID must be 10, 13, or 17 digits'
                    };
                }

                return { valid: true };
            }

            /**
             * Validate social media URL
             */
            function validateSocialURL(url, platform) {
                if (!url || url.trim() === '') return { valid: true }; // Optional field

                const trimmedUrl = url.trim();
                let pattern, platformName, exampleUrl;

                switch(platform) {
                    case 'facebook':
                        pattern = patterns.facebook;
                        platformName = 'Facebook';
                        exampleUrl = 'https://facebook.com/username or facebook.com/username';
                        break;
                    case 'youtube':
                        pattern = patterns.youtube;
                        platformName = 'YouTube';
                        exampleUrl = 'https://youtube.com/@username or youtube.com/@username';
                        break;
                    case 'instagram':
                        pattern = patterns.instagram;
                        platformName = 'Instagram';
                        exampleUrl = 'https://instagram.com/username or @username';
                        break;
                    case 'tiktok':
                        pattern = patterns.tiktok;
                        platformName = 'TikTok';
                        exampleUrl = 'https://tiktok.com/@username or tiktok.com/@username';
                        break;
                    default:
                        return { valid: false, message: 'Unknown platform' };
                }

                if (!pattern.test(trimmedUrl)) {
                    return {
                        valid: false,
                        message: `Please enter a valid ${platformName} URL (e.g., ${exampleUrl})`
                    };
                }

                return { valid: true };
            }

            /**
             * Normalize social media URLs
             */
            function normalizeSocialURL(url, platform) {
                if (!url || url.trim() === '') return '';

                let normalized = url.trim();

                // Add https:// if no protocol specified
                if (!/^https?:\/\//i.test(normalized)) {
                    // For Instagram, check if it's just a username
                    if (platform === 'instagram' && /^@?[\w](?!.*?\.{2})[\w.]{1,28}[\w]$/i.test(normalized)) {
                        normalized = normalized.replace(/^@/, '');
                        normalized = `https://instagram.com/${normalized}`;
                    } else if (platform === 'tiktok' && /^@[\w]+$/i.test(normalized)) {
                        normalized = `https://tiktok.com/${normalized}`;
                    } else {
                        normalized = `https://${normalized}`;
                    }
                }

                return normalized;
            }

            // ========================================
            // REAL-TIME VALIDATION
            // ========================================

            // Clear errors on input
            $('input, textarea').on('input', function() {
                const fieldName = $(this).attr('name');
                clearError(fieldName);
            });

            // Validate mobile on blur
            $('input[name="mobile"]').on('blur', function() {
                const mobile = $(this).val().trim();

                if (!mobile) {
                    showError('mobile', 'Mobile number is required');
                    return;
                }

                const validation = validateBdMobile(mobile);
                if (!validation.valid) {
                    showError('mobile', validation.message);
                }
            });

            // Validate NID on blur
            $('input[name="nid"]').on('blur', function() {
                const nid = $(this).val().trim();

                if (nid) {
                    const validation = validateNID(nid);
                    if (!validation.valid) {
                        showError('nid', validation.message);
                    }
                }
            });

            // Validate and normalize social URLs on blur
            const socialPlatforms = {
                'fb_profile_link': 'facebook',
                'youtube_profile_link': 'youtube',
                'insta_profile_link': 'instagram',
                'tiktalk_profile_link': 'tiktok'
            };

            Object.keys(socialPlatforms).forEach(function(fieldName) {
                $(`input[name="${fieldName}"]`).on('blur', function() {
                    const url = $(this).val().trim();
                    const platform = socialPlatforms[fieldName];

                    if (url) {
                        const validation = validateSocialURL(url, platform);
                        if (!validation.valid) {
                            showError(fieldName, validation.message);
                        } else {
                            // Normalize the URL
                            const normalized = normalizeSocialURL(url, platform);
                            $(this).val(normalized);
                        }
                    }
                });
            });

            // ========================================
            // FORM SUBMISSION VALIDATION
            // ========================================

            $('#editUserProfile').on('submit', function(e) {
                e.preventDefault();

                // Clear all errors
                $('.text-danger').text('');
                $('.is-invalid').removeClass('is-invalid');

                let hasError = false;

                // Validate Name
                const name = $('input[name="name"]').val().trim();
                if (!name) {
                    showError('name', 'Name is required');
                    hasError = true;
                } else if (name.length < 3) {
                    showError('name', 'Name must be at least 3 characters');
                    hasError = true;
                }

                // Validate Email
                const email = $('input[name="email"]').val().trim();
                if (email && !patterns.email.test(email)) {
                    showError('email', 'Please enter a valid email address');
                    hasError = true;
                }

                // Validate Mobile
                const mobile = $('input[name="mobile"]').val().trim();
                if (mobile) {
                    const mobileValidation = validateBdMobile(mobile);
                    if (!mobileValidation.valid) {
                        showError('mobile', mobileValidation.message);
                        hasError = true;
                    }
                }

                // Validate NID
                const nid = $('input[name="nid"]').val().trim();
                if (nid) {
                    const nidValidation = validateNID(nid);
                    if (!nidValidation.valid) {
                        showError('nid', nidValidation.message);
                        hasError = true;
                    }
                }

                // Validate Bio
                const bio = $('textarea[name="bio"]').val().trim();
                if (bio && bio.length > 500) {
                    showError('bio', 'Bio must not exceed 500 characters');
                    hasError = true;
                }

                // Validate Social Media Links
                Object.keys(socialPlatforms).forEach(function(fieldName) {
                    const url = $(`input[name="${fieldName}"]`).val().trim();
                    const platform = socialPlatforms[fieldName];

                    if (url) {
                        const validation = validateSocialURL(url, platform);
                        if (!validation.valid) {
                            showError(fieldName, validation.message);
                            hasError = true;
                        } else {
                            // Normalize the URL before submission
                            const normalized = normalizeSocialURL(url, platform);
                            $(`input[name="${fieldName}"]`).val(normalized);
                        }
                    }
                });

                // If errors exist, scroll to first error and show toast
                if (hasError) {
                    toastr.error('Please fix the errors before submitting');

                    // Scroll to first error
                    const firstError = $('.is-invalid').first();
                    if (firstError.length) {
                        $('html, body').animate({
                            scrollTop: firstError.offset().top - 100
                        }, 500);
                    }

                    return false;
                }

                // All validations passed, show loading state
                const submitBtn = $(this).find('button[type="submit"]');
                const originalText = submitBtn.html();
                submitBtn.prop('disabled', true).html('<i class="bi bi-hourglass-split"></i> Saving...');

                // Submit the form
                this.submit();
            });

            // ========================================
            // AUTO-FORMAT MOBILE NUMBER
            // ========================================

            $('input[name="mobile"]').on('input', function() {
                let value = $(this).val().replace(/\D/g, ''); // Remove non-digits

                // Limit to 11 digits
                if (value.length > 11) {
                    value = value.substring(0, 11);
                }

                $(this).val(value);
            });

            // ========================================
            // CHARACTER COUNTER FOR BIO
            // ========================================

            const bioField = $('textarea[name="bio"]');
            const maxBioLength = 500;

            // Add character counter
            if (bioField.length) {
                const counter = $('<small class="text-muted d-block mt-1">Characters: <span class="bio-char-count">0</span>/' + maxBioLength + '</small>');
                bioField.after(counter);

                bioField.on('input', function() {
                    const length = $(this).val().length;
                    $('.bio-char-count').text(length);

                    if (length > maxBioLength) {
                        $('.bio-char-count').parent().removeClass('text-muted').addClass('text-danger');
                    } else if (length > maxBioLength * 0.9) {
                        $('.bio-char-count').parent().removeClass('text-muted text-danger').addClass('text-warning');
                    } else {
                        $('.bio-char-count').parent().removeClass('text-warning text-danger').addClass('text-muted');
                    }
                });

                // Trigger initial count
                bioField.trigger('input');
            }

            // ========================================
            // NID AUTO-FORMAT
            // ========================================

            $('input[name="nid"]').on('input', function() {
                let value = $(this).val().replace(/\D/g, ''); // Remove non-digits

                // Limit to 17 digits (max NID length)
                if (value.length > 17) {
                    value = value.substring(0, 17);
                }

                $(this).val(value);
            });

            // ========================================
            // SOCIAL MEDIA URL HELPERS
            // ========================================

            // Add visual feedback for verified social accounts
            $('.influencer-social-check').hide(); // Hide by default

            // Show check mark if URL is valid
            function updateSocialCheckmark(fieldName, isValid) {
                const input = $(`input[name="${fieldName}"]`);
                const checkmark = input.closest('.position-relative').find('.influencer-social-check');

                if (isValid && input.val().trim()) {
                    checkmark.fadeIn();
                } else {
                    checkmark.fadeOut();
                }
            }

            // Update checkmarks on blur
            Object.keys(socialPlatforms).forEach(function(fieldName) {
                $(`input[name="${fieldName}"]`).on('blur', function() {
                    const url = $(this).val().trim();
                    const platform = socialPlatforms[fieldName];

                    if (url) {
                        const validation = validateSocialURL(url, platform);
                        updateSocialCheckmark(fieldName, validation.valid);
                    } else {
                        updateSocialCheckmark(fieldName, false);
                    }
                });
            });

            // ========================================
            // INSTAGRAM USERNAME HELPER
            // ========================================

            $('input[name="insta_profile_link"]').on('input', function() {
                let value = $(this).val().trim();

                // If user types @ at the beginning, keep it for visual feedback
                // It will be normalized on blur
                if (value.startsWith('@')) {
                    // Allow @ prefix
                } else if (value && !value.includes('.com') && !value.includes('http')) {
                    // If it looks like a username without @, add it for visual clarity
                    if (!/^@/.test(value)) {
                        // Don't auto-add @ to avoid confusion
                    }
                }
            });

            // ========================================
            // PREVENT MULTIPLE SUBMISSIONS
            // ========================================

            let isSubmitting = false;

            $('#editUserProfile').on('submit', function(e) {
                if (isSubmitting) {
                    e.preventDefault();
                    return false;
                }
                isSubmitting = true;
            });
        });
    </script>
@endpush
