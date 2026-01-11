@extends('admin.master')
@section('title', 'Site Settings')
@section('content')
    <div class="container-fluid my-4">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0"><i class="bi bi-gear-fill me-2"></i>Site Settings</h4>
                        <a href="{{ route('dashboard') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-arrow-left"></i> Back to Dashboard
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('settings-update') }}" method="POST" enctype="multipart/form-data" id="siteSettingsForm">
                            @csrf
                            @method('PUT')

                            <!-- Basic Information Section -->
                            <div class="mb-4">
                                <h5 class="border-bottom pb-2 mb-3">
                                    <i class="bi bi-info-circle text-primary"></i> Basic Information
                                </h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="title" class="form-label">Site Title <span class="text-danger">*</span></label>
                                        <input type="text"
                                               name="title"
                                               id="title"
                                               class="form-control @error('title') is-invalid @enderror"
                                               value="{{ old('title', $siteSetting->title ?? '') }}"
                                               placeholder="Enter site title"
                                               required>
                                        @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="site_color" class="form-label">Site Color</label>
                                        <div class="d-flex">
                                            <input type="color"
                                                   name="site_color"
                                                   id="site_color"
                                                   style="width: 60px!important; height: 35px!important;"
                                                   class="form-control form-control-color me-2 border-0 @error('site_color') is-invalid @enderror"
                                                   value="{{ old('site_color', $siteSetting->site_color ?? '#007bff') }}">
                                            <input type="text"
                                                   class="form-control"
                                                   id="site_color_text"
                                                   value="{{ old('site_color', $siteSetting->site_color ?? '#007bff') }}"
                                                   readonly>
                                        </div>
                                        @error('site_color')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="site_info" class="form-label">Site Information</label>
                                        <textarea name="site_info"
                                                  id="site_info"
                                                  rows="3"
                                                  class="form-control @error('site_info') is-invalid @enderror"
                                                  placeholder="Enter brief site information">{{ old('site_info', $siteSetting->site_info ?? '') }}</textarea>
                                        @error('site_info')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- SEO Meta Section -->
                            <div class="mb-4">
                                <h5 class="border-bottom pb-2 mb-3">
                                    <i class="bi bi-search text-success"></i> SEO & Meta Information
                                </h5>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="meta_title" class="form-label">Meta Title</label>
                                        <input type="text"
                                               name="meta_title"
                                               id="meta_title"
                                               class="form-control @error('meta_title') is-invalid @enderror"
                                               value="{{ old('meta_title', $siteSetting->meta_title ?? '') }}"
                                               placeholder="Enter meta title for SEO">
                                        @error('meta_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="meta_description" class="form-label">Meta Description</label>
                                        <textarea name="meta_description"
                                                  id="meta_description"
                                                  rows="3"
                                                  class="form-control @error('meta_description') is-invalid @enderror"
                                                  placeholder="Enter meta description for SEO">{{ old('meta_description', $siteSetting->meta_description ?? '') }}</textarea>
                                        <small class="text-muted">Recommended: 150-160 characters</small>
                                        @error('meta_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="meta_header" class="form-label">Meta Header Code</label>
                                        <textarea name="meta_header"
                                                  id="meta_header"
                                                  rows="4"
                                                  class="form-control font-monospace @error('meta_header') is-invalid @enderror"
                                                  placeholder="Enter custom header code (e.g., Google Analytics)">{{ old('meta_header', $siteSetting->meta_header ?? '') }}</textarea>
                                        @error('meta_header')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="meta_footer" class="form-label">Meta Footer Code</label>
                                        <textarea name="meta_footer"
                                                  id="meta_footer"
                                                  rows="4"
                                                  class="form-control font-monospace @error('meta_footer') is-invalid @enderror"
                                                  placeholder="Enter custom footer code">{{ old('meta_footer', $siteSetting->meta_footer ?? '') }}</textarea>
                                        @error('meta_footer')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Images & Logos Section -->
                            <div class="mb-4">
                                <h5 class="border-bottom pb-2 mb-3">
                                    <i class="bi bi-images text-info"></i> Images & Logos
                                </h5>
                                <div class="row">
                                    <!-- Favicon -->
                                    <div class="col-md-6 col-lg-3 mb-3">
                                        <label for="favicon" class="form-label">Favicon</label>
                                        <div class="image-upload-wrapper">
                                            <div class="image-preview-container" id="favicon_preview_container">
                                                @if(old('favicon') || ($siteSetting->favicon ?? false))
                                                    <img src="{{ old('favicon') ?? asset($siteSetting->favicon) }}"
                                                         alt="Favicon"
                                                         class="img-thumbnail image-preview"
                                                         id="favicon_preview">
                                                @else
                                                    <div class="no-image-placeholder" id="favicon_placeholder">
                                                        <i class="bi bi-image display-4 text-muted"></i>
                                                        <p class="text-muted small mt-2">No favicon uploaded</p>
                                                    </div>
                                                @endif
                                            </div>
                                            <input type="file"
                                                   name="favicon"
                                                   id="favicon"
                                                   class="form-control mt-2 image-upload-input @error('favicon') is-invalid @enderror"
                                                   accept="image/*"
                                                   data-preview="favicon_preview"
                                                   data-placeholder="favicon_placeholder"
                                                   data-container="favicon_preview_container">
                                            <small class="text-muted">Recommended: 32x32px, ICO/PNG format</small>
                                            @error('favicon')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Menu Logo -->
                                    <div class="col-md-6 col-lg-3 mb-3">
                                        <label for="menu_logo" class="form-label">Menu Logo</label>
                                        <div class="image-upload-wrapper">
                                            <div class="image-preview-container" id="menu_logo_preview_container">
                                                @if(old('menu_logo') || ($siteSetting->menu_logo ?? false))
                                                    <img src="{{ old('menu_logo') ?? asset($siteSetting->menu_logo) }}"
                                                         alt="Menu Logo"
                                                         class="img-thumbnail image-preview"
                                                         id="menu_logo_preview">
                                                @else
                                                    <div class="no-image-placeholder" id="menu_logo_placeholder">
                                                        <i class="bi bi-image display-4 text-muted"></i>
                                                        <p class="text-muted small mt-2">No menu logo uploaded</p>
                                                    </div>
                                                @endif
                                            </div>
                                            <input type="file"
                                                   name="menu_logo"
                                                   id="menu_logo"
                                                   class="form-control mt-2 image-upload-input @error('menu_logo') is-invalid @enderror"
                                                   accept="image/*"
                                                   data-preview="menu_logo_preview"
                                                   data-placeholder="menu_logo_placeholder"
                                                   data-container="menu_logo_preview_container">
                                            <small class="text-muted">Recommended: 180x50px, PNG format</small>
                                            @error('menu_logo')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Main Logo -->
                                    <div class="col-md-6 col-lg-3 mb-3">
                                        <label for="logo" class="form-label">Main Logo</label>
                                        <div class="image-upload-wrapper">
                                            <div class="image-preview-container" id="logo_preview_container">
                                                @if(old('logo') || ($siteSetting->logo ?? false))
                                                    <img src="{{ old('logo') ?? asset($siteSetting->logo) }}"
                                                         alt="Logo"
                                                         class="img-thumbnail image-preview"
                                                         id="logo_preview">
                                                @else
                                                    <div class="no-image-placeholder" id="logo_placeholder">
                                                        <i class="bi bi-image display-4 text-muted"></i>
                                                        <p class="text-muted small mt-2">No logo uploaded</p>
                                                    </div>
                                                @endif
                                            </div>
                                            <input type="file"
                                                   name="logo"
                                                   id="logo"
                                                   class="form-control mt-2 image-upload-input @error('logo') is-invalid @enderror"
                                                   accept="image/*"
                                                   data-preview="logo_preview"
                                                   data-placeholder="logo_placeholder"
                                                   data-container="logo_preview_container">
                                            <small class="text-muted">Recommended: 250x80px, PNG format</small>
                                            @error('logo')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Banner -->
                                    <div class="col-md-6 col-lg-3 mb-3">
                                        <label for="banner" class="form-label">Banner <span class="text-danger">*</span></label>
                                        <div class="image-upload-wrapper">
                                            <div class="image-preview-container" id="banner_preview_container">
                                                @if(old('banner') || ($siteSetting->banner ?? false))
                                                    <img src="{{ old('banner') ?? asset($siteSetting->banner) }}"
                                                         alt="Banner"
                                                         class="img-thumbnail image-preview"
                                                         id="banner_preview">
                                                @else
                                                    <div class="no-image-placeholder" id="banner_placeholder">
                                                        <i class="bi bi-image display-4 text-muted"></i>
                                                        <p class="text-muted small mt-2">No banner uploaded</p>
                                                    </div>
                                                @endif
                                            </div>
                                            <input type="file"
                                                   name="banner"
                                                   id="banner"
                                                   class="form-control mt-2 image-upload-input @error('banner') is-invalid @enderror"
                                                   accept="image/*"
                                                   data-preview="banner_preview"
                                                   data-placeholder="banner_placeholder"
                                                   data-container="banner_preview_container"
                                                {{ ($siteSetting->banner ?? false) ? '' : 'required' }}>
                                            <small class="text-muted">Recommended: 1920x600px, JPG/PNG format</small>
                                            @error('banner')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Information Section -->
                            <div class="mb-4">
                                <h5 class="border-bottom pb-2 mb-3">
                                    <i class="bi bi-telephone text-warning"></i> Contact Information
                                </h5>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="office_mobile" class="form-label">Office Mobile <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-phone"></i></span>
                                            <input type="tel"
                                                   name="office_mobile"
                                                   id="office_mobile"
                                                   class="form-control @error('office_mobile') is-invalid @enderror"
                                                   value="{{ old('office_mobile', $siteSetting->office_mobile ?? '') }}"
                                                   placeholder="+880 1234-567890"
                                                   required>
                                        </div>
                                        @error('office_mobile')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="office_email" class="form-label">Office Email <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                            <input type="email"
                                                   name="office_email"
                                                   id="office_email"
                                                   class="form-control @error('office_email') is-invalid @enderror"
                                                   value="{{ old('office_email', $siteSetting->office_email ?? '') }}"
                                                   placeholder="office@herlan.com"
                                                   required>
                                        </div>
                                        @error('office_email')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="office_address" class="form-label">Office Address <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                                            <input type="text"
                                                   name="office_address"
                                                   id="office_address"
                                                   class="form-control @error('office_address') is-invalid @enderror"
                                                   value="{{ old('office_address', $siteSetting->office_address ?? '') }}"
                                                   placeholder="Enter office address"
                                                   required>
                                        </div>
                                        @error('office_address')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Social Media Links Section -->
                            <div class="mb-4">
                                <h5 class="border-bottom pb-2 mb-3">
                                    <i class="bi bi-share text-danger"></i> Social Media Links
                                </h5>
                                <div class="row">
                                    <div class="col-md-6 col-lg-3 mb-3">
                                        <label for="fb_link" class="form-label">Facebook</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-facebook"></i></span>
                                            <input type="url"
                                                   name="fb_link"
                                                   id="fb_link"
                                                   class="form-control @error('fb_link') is-invalid @enderror"
                                                   value="{{ old('fb_link', $siteSetting->fb_link ?? '') }}"
                                                   placeholder="https://facebook.com/yourpage">
                                        </div>
                                        @error('fb_link')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 col-lg-3 mb-3">
                                        <label for="insta_link" class="form-label">Instagram</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-instagram"></i></span>
                                            <input type="url"
                                                   name="insta_link"
                                                   id="insta_link"
                                                   class="form-control @error('insta_link') is-invalid @enderror"
                                                   value="{{ old('insta_link', $siteSetting->insta_link ?? '') }}"
                                                   placeholder="https://instagram.com/yourprofile">
                                        </div>
                                        @error('insta_link')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 col-lg-3 mb-3">
                                        <label for="yt_link" class="form-label">YouTube</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-youtube"></i></span>
                                            <input type="url"
                                                   name="yt_link"
                                                   id="yt_link"
                                                   class="form-control @error('yt_link') is-invalid @enderror"
                                                   value="{{ old('yt_link', $siteSetting->yt_link ?? '') }}"
                                                   placeholder="https://youtube.com/yourchannel">
                                        </div>
                                        @error('yt_link')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 col-lg-3 mb-3">
                                        <label for="tiktok_link" class="form-label">TikTok</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-tiktok"></i></span>
                                            <input type="url"
                                                   name="tiktok_link"
                                                   id="tiktok_link"
                                                   class="form-control @error('tiktok_link') is-invalid @enderror"
                                                   value="{{ old('tiktok_link', $siteSetting->tiktok_link ?? '') }}"
                                                   placeholder="https://tiktok.com/@yourprofile">
                                        </div>
                                        @error('tiktok_link')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Custom Code Section -->
                            <div class="mb-4">
                                <h5 class="border-bottom pb-2 mb-3">
                                    <i class="bi bi-code-slash text-secondary"></i> Custom Code
                                </h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="header_custom_code" class="form-label">Header Custom Code</label>
                                        <textarea name="header_custom_code"
                                                  id="header_custom_code"
                                                  rows="6"
                                                  class="form-control font-monospace @error('header_custom_code') is-invalid @enderror"
                                                  placeholder="Enter custom header code (HTML, CSS, JS)">{{ old('header_custom_code', $siteSetting->header_custom_code ?? '') }}</textarea>
                                        <small class="text-muted">This code will be inserted in the &lt;head&gt; section</small>
                                        @error('header_custom_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="footer_custom_code" class="form-label">Footer Custom Code</label>
                                        <textarea name="footer_custom_code"
                                                  id="footer_custom_code"
                                                  rows="6"
                                                  class="form-control font-monospace @error('footer_custom_code') is-invalid @enderror"
                                                  placeholder="Enter custom footer code (HTML, CSS, JS)">{{ old('footer_custom_code', $siteSetting->footer_custom_code ?? '') }}</textarea>
                                        <small class="text-muted">This code will be inserted before &lt;/body&gt; tag</small>
                                        @error('footer_custom_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="d-flex justify-content-end gap-2 pt-3 border-top">
                                <button type="reset" class="btn btn-secondary">
                                    <i class="bi bi-arrow-clockwise"></i> Reset
                                </button>
                                <button type="submit" class="btn btn-primary" id="submitBtn">
                                    <i class="bi bi-save"></i> Save Settings
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .image-upload-wrapper {
            position: relative;
        }

        .image-preview-container {
            width: 100%;
            height: 150px;
            border: 2px dashed #dee2e6;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background-color: #f8f9fa;
            transition: all 0.3s ease;
        }

        .image-preview-container:hover {
            border-color: #0d6efd;
            background-color: #e7f1ff;
        }

        .image-preview {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 10px;
        }

        .no-image-placeholder {
            text-align: center;
            color: #6c757d;
        }

        .no-image-placeholder i {
            opacity: 0.5;
        }

        .font-monospace {
            font-family: 'Courier New', Courier, monospace;
            font-size: 0.9rem;
        }

        .input-group-text {
            background-color: #f8f9fa;
        }

        .card {
            border: none;
            border-radius: 10px;
        }

        .card-header {
            border-radius: 10px 10px 0 0 !important;
        }

        h5 {
            color: #495057;
            font-weight: 600;
        }

        .border-bottom {
            border-color: #dee2e6 !important;
        }

        /* Smooth form animations */
        .form-control:focus,
        .form-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
        }

        /* Loading state for submit button */
        #submitBtn.loading {
            pointer-events: none;
            opacity: 0.6;
        }

        #submitBtn.loading::after {
            content: '';
            display: inline-block;
            width: 14px;
            height: 14px;
            margin-left: 8px;
            border: 2px solid #ffffff;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 0.6s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .card-header h4 {
                font-size: 1.1rem;
            }

            .image-preview-container {
                height: 120px;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            // ========================================
            // IMAGE PREVIEW FUNCTIONALITY
            // ========================================
            $('.image-upload-input').on('change', function(e) {
                const file = e.target.files[0];
                const previewId = $(this).data('preview');
                const placeholderId = $(this).data('placeholder');
                const containerId = $(this).data('container');

                if (file && file.type.startsWith('image/')) {
                    // Validate file size (5MB max)
                    if (file.size > 5 * 1024 * 1024) {
                        toastr.error('Image size should be less than 5MB');
                        $(this).val('');
                        return;
                    }

                    const reader = new FileReader();
                    reader.onload = function(e) {
                        // Check if preview image exists
                        if ($('#' + previewId).length) {
                            $('#' + previewId).attr('src', e.target.result);
                        } else {
                            // Remove placeholder and add image
                            $('#' + placeholderId).remove();
                            $('#' + containerId).append(
                                `<img src="${e.target.result}" alt="Preview" class="img-thumbnail image-preview" id="${previewId}">`
                            );
                        }
                    };
                    reader.readAsDataURL(file);
                } else if (file) {
                    toastr.error('Please select a valid image file');
                    $(this).val('');
                }
            });

            // ========================================
            // COLOR PICKER SYNC
            // ========================================
            $('#site_color').on('input', function() {
                $('#site_color_text').val($(this).val());
            });

            $('#site_color_text').on('input', function() {
                const colorValue = $(this).val();
                if (/^#[0-9A-F]{6}$/i.test(colorValue)) {
                    $('#site_color').val(colorValue);
                }
            });

            // ========================================
            // FORM VALIDATION
            // ========================================
            $('#siteSettingsForm').on('submit', function(e) {
                let isValid = true;
                const requiredFields = ['title', 'office_mobile', 'office_email', 'office_address'];

                // Clear previous errors
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').remove();

                // Validate required fields
                requiredFields.forEach(function(field) {
                    const input = $(`[name="${field}"]`);
                    if (!input.val().trim()) {
                        input.addClass('is-invalid');
                        input.after(`<div class="invalid-feedback">This field is required</div>`);
                        isValid = false;
                    }
                });

                // Validate email format
                const email = $('#office_email').val();
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (email && !emailRegex.test(email)) {
                    $('#office_email').addClass('is-invalid');
                    $('#office_email').after(`<div class="invalid-feedback">Please enter a valid email address</div>`);
                    isValid = false;
                }

                // Validate URLs
                const urlFields = ['fb_link', 'insta_link', 'yt_link', 'tiktok_link'];
                const urlRegex = /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/;
                urlFields.forEach(function(field) {
                    const input = $(`[name="${field}"]`);
                    const value = input.val();
                    if (value && !urlRegex.test(value)) {
                        input.addClass('is-invalid');
                        input.parent().after(`<div class="invalid-feedback d-block">Please enter a valid URL</div>`);
                        isValid = false;
                    }
                });

                if (!isValid) {
                    e.preventDefault();
                    toastr.error('Please fix the errors before submitting');
                    // Scroll to first error
                    $('html, body').animate({
                        scrollTop: $('.is-invalid').first().offset().top - 100
                    }, 500);
                    return false;
                }

                // Show loading state
                const submitBtn = $('#submitBtn');
                submitBtn.addClass('loading');
                submitBtn.prop('disabled', true);
            });

            // ========================================
            // DYNAMIC ERROR CLEARING
            // ========================================
            $('input, textarea').on('input', function() {
                $(this).removeClass('is-invalid');
                $(this).siblings('.invalid-feedback').remove();
                $(this).parent().siblings('.invalid-feedback').remove();
            });

            // ========================================
            // CHARACTER COUNTER FOR META DESCRIPTION
            // ========================================
            const metaDesc = $('#meta_description');
            const charCount = $('<small class="text-muted d-block mt-1">Characters: <span id="char-count">0</span>/160</small>');
            metaDesc.after(charCount);

            metaDesc.on('input', function() {
                const length = $(this).val().length;
                $('#char-count').text(length);

                if (length > 160) {
                    $('#char-count').parent().removeClass('text-muted').addClass('text-danger');
                } else if (length > 150) {
                    $('#char-count').parent().removeClass('text-muted text-danger').addClass('text-warning');
                } else {
                    $('#char-count').parent().removeClass('text-warning text-danger').addClass('text-muted');
                }
            });

            // Trigger initial count
            metaDesc.trigger('input');

            // ========================================
            // RESET FORM CONFIRMATION
            // ========================================
            $('button[type="reset"]').on('click', function(e) {
                if (!confirm('Are you sure you want to reset all changes?')) {
                    e.preventDefault();
                }
            });

            // ========================================
            // AUTO-SAVE DRAFT (Optional)
            // ========================================
            let autoSaveTimer;
            $('input, textarea').on('input', function() {
                clearTimeout(autoSaveTimer);
                autoSaveTimer = setTimeout(function() {
                    // Save to localStorage as draft
                    const formData = $('#siteSettingsForm').serializeArray();
                    localStorage.setItem('siteSettingsDraft', JSON.stringify(formData));
                    console.log('Draft saved');
                }, 2000);
            });

            // Restore draft on page load
            const draft = localStorage.getItem('siteSettingsDraft');
            if (draft && !$('#siteSettingsForm input[name="title"]').val()) {
                if (confirm('A draft was found. Would you like to restore it?')) {
                    const formData = JSON.parse(draft);
                    formData.forEach(function(item) {
                        $(`[name="${item.name}"]`).val(item.value);
                    });
                }
            }
        });
    </script>

@endpush
