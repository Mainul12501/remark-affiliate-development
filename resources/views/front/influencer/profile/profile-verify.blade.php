@extends('front.master')

@section('title', 'Influencer Profile Verify')

@section('body')

    <!-- Profile Section -->
    <section class="profile-section">
        <div class="profile-layout">
            <!-- Profile Upload Section -->
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

            <!-- Profile Form -->
            <form action="{{ route('influencer.request-profile-review') }}" method="post" enctype="multipart/form-data">
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
                                           maxlength="11"
                                           placeholder="Influencer Mobile">
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

                            <div class="col-12 mt-2">
                                <button type="submit" class="btn-submit-profile mb-5">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
{{--            </form>--}}

            <!-- Social Media Links Section -->
            <h2 class="social-media-title m-b-20">Social Media Links</h2>

            <div class="row">
                <!-- Left Social Column -->
                <div class="col-12">
                    <div class="row">
                        <!-- Facebook -->
                        <div class="col-md-6 mt-3">
                            <label class="social-label">Facebook</label>
                            <div class="social-input-wrapper">
                                <input type="text"
                                       name="fb_profile_link"
                                       class="social-input"
                                       placeholder="facebook.com/johndoe"
                                       value="{{ old('fb_profile_link', $loggedUser->userInfo->fb_profile_link ?? '') }}" {{ $loggedUser?->userInfo?->is_fb_verified == 1 ? 'disabled' : '' }}>
                                @if($loggedUser?->userInfo?->is_fb_verified == 1)
                                    <span class="social-input-check" aria-hidden="true">
                                        <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="8" cy="8" r="8" fill="#28C76F"/>
                                            <path d="M4 7.9L6.9 10.7L12 5.7" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                @endif
                            </div>
                            <small class="text-danger error-fb_profile_link d-block mb-2"></small>
                            <a href="{{ route('influencer.profile') }}"
                               class="btn-social-login btn-facebook"
                               {{ $loggedUser?->userInfo?->is_fb_verified == 1 ? 'disabled' : '' }}
                               style="text-decoration: none!important;">
                                <i class="bi bi-facebook"></i>
                                Log in with Facebook
                            </a>
                        </div>

                        <!-- Youtube -->
                        <div class="col-md-6 mt-3">
                            <label class="social-label">Youtube</label>
                            <div class="social-input-wrapper">
                                <input type="text"
                                       name="youtube_profile_link"
                                       class="social-input"
                                       placeholder="Youtube.com/@johndoe"
                                       value="{{ old('youtube_profile_link', $loggedUser->userInfo->youtube_profile_link ?? '') }}" {{ $loggedUser?->userInfo?->is_youtube_verified == 1 ? 'disabled' : '' }}>
                                @if($loggedUser?->userInfo?->is_youtube_verified)
                                    <span class="social-input-check" aria-hidden="true">
                                        <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="8" cy="8" r="8" fill="#28C76F"/>
                                            <path d="M4 7.9L6.9 10.7L12 5.7" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                @endif
                            </div>
                            <small class="text-danger error-youtube_profile_link d-block mb-2"></small>
                            <button type="button"
                                    class="btn-social-login btn-google"
                                {{ $loggedUser?->userInfo?->is_youtube_verified == 1 ? 'disabled' : '' }}>
                                <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                                </svg>
                                Login with Google
                            </button>
                            <p class="google-helper-text">Use your Google account that is linked with your YouTube Channel</p>
                        </div>
                    </div>
                </div>

                <!-- Right Social Column -->
                <div class="col-12">
                    <div class="row">
                        <!-- Instagram -->
                        <div class="col-md-6 mt-5">
                            <label class="social-label">Instagram</label>
                            <div class="social-input-wrapper">
                                <span class="social-input-prefix">@</span>
                                <input type="text"
                                       name="insta_profile_link"
                                       class="social-input social-input-with-prefix"
                                       placeholder="johndoe"
                                       value="{{ old('insta_profile_link', $loggedUser->userInfo->insta_profile_link ?? '') }}" {{ $loggedUser?->userInfo?->is_insta_verified == 1 ? 'disabled' : '' }}>
                                @if($loggedUser?->userInfo?->is_insta_verified == 1)
                                    <span class="social-input-check" aria-hidden="true">
                                        <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="8" cy="8" r="8" fill="#28C76F"/>
                                            <path d="M4 7.9L6.9 10.7L12 5.7" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                @endif
                            </div>
                            <small class="text-danger error-insta_profile_link d-block mb-2"></small>
                            <button type="button"
                                    class="btn-social-login btn-instagram bg-light"
                                    style="background-color: white!important;">
                                <i class="bi bi-instagram"></i>
                                Log in with Instagram
                            </button>
                        </div>

                        <!-- Tiktok -->
                        <div class="col-md-6 mt-5">
                            <label class="social-label">Tiktok</label>
                            <div class="social-input-wrapper">
                                <span class="social-input-prefix">@</span>
                                <input type="text"
                                       name="tiktalk_profile_link"
                                       class="social-input social-input-with-prefix"
                                       placeholder="username or tiktok.com/@username"
                                       value="{{ old('tiktalk_profile_link', $loggedUser->userInfo->tiktalk_profile_link ?? '') }}" {{ $loggedUser?->userInfo?->is_tiktalk_varified == 1 ? 'disabled' : '' }}>
                                @if($loggedUser?->userInfo?->is_tiktalk_varified == 1)
                                    <span class="social-input-check" aria-hidden="true">
                                        <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="8" cy="8" r="8" fill="#28C76F"/>
                                            <path d="M4 7.9L6.9 10.7L12 5.7" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                                @endif
                            </div>
                            <small class="text-danger error-tiktalk_profile_link d-block mb-2"></small>
                            <button type="button"
                                    class="btn-social-login btn-tiktok"
                                {{ $loggedUser?->userInfo?->is_tiktalk_varified == 1 ? 'disabled' : '' }}>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z"/>
                                </svg>
                                Log in with Tiktok
                            </button>
                        </div>
                    </div>
                </div>
            </div>


            </form>



        </div>
    </section>

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
            border-radius: 50%;
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

            $('form').on('submit', function(e) {
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

                // All validations passed, submit the form
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
        });
    </script>

    <style>
        .is-invalid {
            border-color: #dc3545 !important;
        }

        .form-input-profile.is-invalid,
        .form-textarea-profile.is-invalid,
        .form-control.is-invalid,
        .social-input.is-invalid {
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
