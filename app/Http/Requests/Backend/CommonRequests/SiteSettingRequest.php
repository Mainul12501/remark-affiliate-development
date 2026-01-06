<?php

namespace App\Http\Requests\Backend\CommonRequests;

use Illuminate\Foundation\Http\FormRequest;

class SiteSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:191',
            'meta_title' => 'nullable|string',
            'meta_description' => 'nullable|string',
            'site_info' => 'nullable|string',
            'site_color' => 'nullable|string|max:7',
            'office_mobile' => 'nullable|string|max:14',
            'office_email' => 'nullable|email|max:191',
            'office_address' => 'nullable|string',
            'fb_link' => 'nullable|url',
            'insta_link' => 'nullable|url',
            'yt_link' => 'nullable|url',
            'tiktok_link' => 'nullable|url',
            'favicon' => 'nullable|image|mimes:ico,png,jpg,jpeg|max:2048',
            'menu_logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'banner' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The site title is required.',
            'title.string' => 'The site title must be a valid text.',
            'title.max' => 'The site title may not exceed 191 characters.',

//            'office_mobile.required' => 'Office mobile number is required.',
            'office_mobile.max' => 'Office mobile number may not exceed 191 characters.',

//            'office_email.required' => 'Office email address is required.',
            'office_email.email' => 'Please enter a valid office email address.',
            'office_email.max' => 'Office email may not exceed 191 characters.',

//            'office_address.required' => 'Office address is required.',
            'office_address.max' => 'Office address may not exceed 191 characters.',

            'site_color.max' => 'Site color code must not exceed 7 characters.',

            'fb_link.url' => 'Facebook link must be a valid URL.',
            'insta_link.url' => 'Instagram link must be a valid URL.',
            'yt_link.url' => 'YouTube link must be a valid URL.',
            'tiktok_link.url' => 'TikTok link must be a valid URL.',

            'favicon.image' => 'Favicon must be an image file.',
            'favicon.mimes' => 'Favicon must be a file of type: ico, png, jpeg or jpg.',
            'favicon.max' => 'Favicon size must not exceed 2MB.',

            'menu_logo.image' => 'Menu logo must be an image.',
            'menu_logo.mimes' => 'Menu logo must be a PNG or JPG image.',
            'menu_logo.max' => 'Menu logo size must not exceed 2MB.',

            'logo.image' => 'Logo must be an image.',
            'logo.mimes' => 'Logo must be a PNG or JPG image.',
            'logo.max' => 'Logo size must not exceed 2MB.',

            'banner.image' => 'Banner must be an image.',
            'banner.mimes' => 'Banner must be a JPG or PNG image.',
            'banner.max' => 'Banner size must not exceed 5MB.',
        ];
    }
}
