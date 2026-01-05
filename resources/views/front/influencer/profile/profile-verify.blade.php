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
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="profile_image_base64" id="profileImageBase64">

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
                                       placeholder="johndoe"
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
@endpush


{{--@extends('front.master')--}}

{{--@section('title', 'Influencer Profile Verify')--}}

{{--@section('body')--}}

{{--    <!-- Profile Section -->--}}
{{--    <section class="profile-section">--}}
{{--        <div class="profile-layout">--}}
{{--            <!-- Profile Upload Section -->--}}
{{--            <div class="profile-upload-card">--}}
{{--                <h3 class="profile-upload-title">Upload Your Profile Picture</h3>--}}
{{--                <div class="profile-upload-box">--}}
{{--                    <div class="profile-avatar">--}}
{{--                        <svg class="profile-avatar-icon" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <circle cx="50" cy="35" r="18" fill="#79A8F3"/>--}}
{{--                            <path d="M20 85C20 69 34 65 50 65C66 65 80 69 80 85" fill="#79A8F3"/>--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                    <button class="btn-upload" type="button">Upload</button>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Profile Form -->--}}
{{--            <form class="profile-form" method="post" action="">--}}
{{--                @csrf--}}
{{--                <div class="form-group-profile">--}}
{{--                    <label class="form-label-profile">Name</label>--}}
{{--                    <input type="text" class="form-input-profile" placeholder="">--}}
{{--                </div>--}}

{{--                <div class="form-group-profile">--}}
{{--                    <label class="form-label-profile">Bio</label>--}}
{{--                    <textarea class="form-textarea-profile" placeholder=""></textarea>--}}
{{--                </div>--}}

{{--                <div class="form-group-profile">--}}
{{--                    <label class="form-label-profile">Referral Account</label>--}}
{{--                    <input type="text" class="form-input-profile" placeholder="">--}}
{{--                </div>--}}

{{--                <button type="submit" class="btn-submit-profile">Submit</button>--}}
{{--            </form>--}}

{{--            <form action="" method="post">--}}
{{--                @csrf--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm-9">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-sm-6 mt-2">--}}
{{--                                <div class="form-group ">--}}
{{--                                    <label class="form-label-profile">Name</label>--}}
{{--                                    <input type="text" name="name" value="{{ old('name') ?? $loggedUser->name }}" class="form-input-profile" required placeholder="Full Name">--}}
{{--                                    <small class="text-danger error-name">@error('name'){{ $message }}@enderror</small>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-6 mt-2">--}}
{{--                                <div class="form-group ">--}}
{{--                                    <label class="form-label-profile">Email</label>--}}
{{--                                    <input type="email" name="email" value="{{ old('email') ?? $loggedUser->email }}" class="form-input-profile"  placeholder="Influencer Email">--}}
{{--                                    <small class="text-danger error-email">@error('email'){{ $message }}@enderror</small>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-4 mt-2">--}}
{{--                                <div class="form-group ">--}}
{{--                                    <label class="form-label-profile">Phone</label>--}}
{{--                                    <input type="tel" name="mobile" value="{{ old('mobile') ?? $loggedUser->mobile }}" class="form-input-profile"  placeholder="Influencer Mobile">--}}
{{--                                    <small class="text-danger error-mobile">@error('mobile'){{ $message }}@enderror</small>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-4 mt-2">--}}
{{--                                <div class="form-group ">--}}
{{--                                    <label class="form-label-profile">NID</label>--}}
{{--                                    <input type="number" maxlength="18" min="0" name="nid" value="{{ old('nid') ?? $loggedUser?->userInfo?->nid }}" class="form-input-profile"  placeholder="Influencer NID Number">--}}
{{--                                    <small class="text-danger error-nid">@error('nid'){{ $message }}@enderror</small>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-4 mt-2">--}}
{{--                                <div class="form-group ">--}}
{{--                                    <label class="form-label-profile">Referral Account</label>--}}
{{--                                    <input type="text" name="reffered_agent_url" value="{{ old('nid') ?? $loggedUser?->userInfo?->nid }}" class="form-input-profile" placeholder="">--}}
{{--                                    <small class="text-danger error-reffered_agent_url">@error('reffered_agent_url'){{ $message }}@enderror</small>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm-12 mt-2">--}}
{{--                                <div class="form-group ">--}}
{{--                                    <label class="form-label-profile">Bio</label>--}}
{{--                                    <textarea class="form-textarea-profile" name="bio" placeholder=""></textarea>--}}
{{--                                    <small class="text-danger error-bio">@error('bio'){{ $message }}@enderror</small>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-12 mt-2">--}}
{{--                                <button type="submit" class="btn-submit-profile mb-5">Submit</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}

{{--            <!-- Social Media Links Section -->--}}
{{--            <h2 class="social-media-title m-b-20">Social Media Links</h2>--}}

{{--            <div class=" row">--}}
{{--                <!-- Left Social Column -->--}}
{{--                <div class=" col-12">--}}
{{--                    <div class="row">--}}
{{--                        <!-- Facebook -->--}}
{{--                        <div class="col-md-6 mt-3">--}}
{{--                            <label class="social-label">Facebook</label>--}}
{{--                            <div class="social-input-wrapper">--}}
{{--                                <input type="text" class="social-input" placeholder="facebook.com/johndoe" value="facebook.com/johndoe">--}}
{{--                                @if($loggedUser?->userInfo?->is_fb_verified == 1)--}}
{{--                                    <span class="social-input-check" aria-hidden="true">--}}
{{--                                        <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                            <circle cx="8" cy="8" r="8" fill="#28C76F"/>--}}
{{--                                            <path d="M4 7.9L6.9 10.7L12 5.7" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                                        </svg>--}}
{{--                                    </span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                            <a href="{{ route('influencer.profile') }}" class="btn-social-login btn-facebook" {{ $loggedUser?->userInfo?->is_youtube_verified == 1 ? 'disabled' : '' }} style="text-decoration: none!important;">--}}
{{--                                <i class="bi bi-facebook"></i>--}}
{{--                                Log in with Facebook--}}
{{--                            </a>--}}
{{--                        </div>--}}

{{--                        <!-- Youtube -->--}}
{{--                        <div class="col-md-6 mt-3">--}}
{{--                            <label class="social-label">Youtube</label>--}}
{{--                            <div class="social-input-wrapper">--}}
{{--                                <input type="text" class="social-input" placeholder="Youtube.com/@johndoe" value="Youtube.com/@johndoe">--}}
{{--                                @if($loggedUser?->userInfo?->is_youtube_verified)--}}
{{--                                    <span class="social-input-check" aria-hidden="true">--}}
{{--                            <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <circle cx="8" cy="8" r="8" fill="#28C76F"/>--}}
{{--                                <path d="M4 7.9L6.9 10.7L12 5.7" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                            </svg>--}}
{{--                        </span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                            <button type="button" class="btn-social-login btn-google" {{ $loggedUser?->userInfo?->is_youtube_verified == 1 ? 'disabled' : '' }} >--}}
{{--                                <svg width="20" height="20" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>--}}
{{--                                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>--}}
{{--                                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>--}}
{{--                                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>--}}
{{--                                </svg>--}}
{{--                                Login with Google--}}
{{--                            </button>--}}
{{--                            <p class="google-helper-text">Use your Google account that is linked with your YouTube Channel</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Right Social Column -->--}}
{{--                <div class=" col-12">--}}
{{--                    <div class="row">--}}

{{--                        <!-- Instagram -->--}}
{{--                        <div class="col-md-6 mt-5">--}}
{{--                            <label class="social-label">Instagram</label>--}}
{{--                            <div class="social-input-wrapper">--}}
{{--                                <span class="social-input-prefix">@</span>--}}
{{--                                <input type="text" class="social-input social-input-with-prefix" placeholder="johndoe" value="johndoe">--}}
{{--                                @if($loggedUser?->userInfo?->is_insta_verified == 1)--}}
{{--                                    <span class="social-input-check" aria-hidden="true">--}}
{{--                            <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <circle cx="8" cy="8" r="8" fill="#28C76F"/>--}}
{{--                                <path d="M4 7.9L6.9 10.7L12 5.7" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                            </svg>--}}
{{--                        </span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                            <button type="button" class="btn-social-login btn-instagram bg-light"  style="background-color: white!important; ">--}}
{{--                                <i class="bi bi-instagram"></i>--}}
{{--                                Log in with Instagram--}}
{{--                            </button>--}}
{{--                        </div>--}}

{{--                        <!-- Tiktok -->--}}
{{--                        <div class="col-md-6 mt-5">--}}
{{--                            <label class="social-label">Tiktok</label>--}}
{{--                            <div class="social-input-wrapper">--}}
{{--                                <span class="social-input-prefix">@</span>--}}
{{--                                <input type="text" class="social-input social-input-with-prefix" placeholder="johndoe" value="johndoe">--}}
{{--                                @if($loggedUser?->userInfo?->is_tiktalk_varified == 1)--}}
{{--                                    <span class="social-input-check" aria-hidden="true">--}}
{{--                            <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <circle cx="8" cy="8" r="8" fill="#28C76F"/>--}}
{{--                                <path d="M4 7.9L6.9 10.7L12 5.7" stroke="white" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>--}}
{{--                            </svg>--}}
{{--                        </span>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                            <button type="button" class="btn-social-login btn-tiktok" {{ $loggedUser?->userInfo?->is_youtube_verified == 1 ? 'disabled' : '' }} >--}}
{{--                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                    <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z"/>--}}
{{--                                </svg>--}}
{{--                                Log in with Tiktok--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--@endsection--}}
