<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/sync-herlan-brands', function (){
    $data = [
        [
            "name" => "Brooke Douglas",
            "slug" => "uterque-demens-claustrum",
            "logo" => "https://loremflickr.com/1838/2396?lock=612173388635921",
            "herlan_brand_uri" => "https://loremflickr.com/1838/2396?lock=612173388635921",
            "id" => "1",
            "status" => 1,
            "note" => "note content",
        ],
        [
            "name" => "Darin Feil",
            "slug" => "volaticus-aestas-comis",
            "logo" => "https://loremflickr.com/371/2725?lock=7178748366456843",
            "herlan_brand_uri" => "https://loremflickr.com/371/2725?lock=7178748366456843",
            "id" => "2",
            "status" => 1,
            "note" => "note content",
        ],
        [
            "name" => "Dr. Juan Berge",
            "slug" => "ademptio-temptatio-cometes",
            "logo" => "https://loremflickr.com/876/1459?lock=3613231041385795",
            "herlan_brand_uri" => "https://loremflickr.com/876/1459?lock=3613231041385795",
            "id" => "3",
            "status" => 1,
            "note" => "note content",
        ]
    ];
    return response()->json($data);
});
Route::get('/herlan-category-list', function (){
    $data = [
        [
            "id" => 1,
            "name" => "Makeup",
            "slug" => "makeup",
            "image" => "https://www.herlan.com/wp-content/uploads/2024/12/Olin-Lip-Balm-Front-Lemon-800x800.webp",
            "product_count" => 304,
            "uri" => "https://www.herlan.com/product-category/makeup/eyes/eyeliner/",
            "sub_categories" => [
                [
                    "id" => 101,
                    "category_id" => 1,
                    "name" => "Face",
                    "slug" => "makeup-face",
                    "image" => "https://www.herlan.com/wp-content/uploads/2024/12/Olin-Lip-Balm-Front-Lemon-800x800.webp",
                    "product_count" => 50,
                    "uri" => "https://www.herlan.com/product-category/makeup/eyes/eyeliner/",
                    "sub_categories" => [
                        [
                            "id" => 1011,
                            "category_id" => 101,
                            "name" => "Foundation",
                            "slug" => "foundation",
                            "image" => "https://www.herlan.com/wp-content/uploads/2024/12/Olin-Lip-Balm-Front-Lemon-800x800.webp",
                            "product_count" => 12,
                            "uri" => "https://www.herlan.com/product-category/makeup/eyes/eyeliner/",
                            "sub_categories" => []
                        ],
                    ]
                ],
                [
                    "id" => 102,
                    "category_id" => 1,
                    "name" => "Lips",
                    "slug" => "makeup-lips",
                    "image" => "https://www.herlan.com/wp-content/uploads/2024/12/Olin-Lip-Balm-Front-Lemon-800x800.webp",
                    "product_count" => 110,
                    "uri" => "https://www.herlan.com/product-category/makeup/eyes/eyeliner/",
                    "sub_categories" => []
                ]
            ]
        ],
        [
            "id" => 2,
            "name" => "Skin Care",
            "slug" => "skin-care",
            "image" => "https://www.herlan.com/wp-content/uploads/2024/12/Olin-Lip-Balm-Front-Lemon-800x800.webp",
            "product_count" => 162,
            "uri" => "https://www.herlan.com/product-category/makeup/eyes/eyeliner/",
            "sub_categories" => [
                [
                    "id" => 201,
                    "category_id" => 2,
                    "name" => "Cleanser",
                    "slug" => "cleanser",
                    "image" => "https://www.herlan.com/wp-content/uploads/2024/12/Olin-Lip-Balm-Front-Lemon-800x800.webp",
                    "product_count" => 35,
                    "uri" => "https://www.herlan.com/product-category/makeup/eyes/eyeliner/",
                    "sub_categories" => [
                        [
                            "id" => 2011,
                            "category_id" => 201,
                            "name" => "Face Wash",
                            "slug" => "face-wash",
                            "image" => "https://www.herlan.com/wp-content/uploads/2024/12/Olin-Lip-Balm-Front-Lemon-800x800.webp",
                            "product_count" => 16,
                            "uri" => "https://www.herlan.com/product-category/makeup/eyes/eyeliner/",
                            "sub_categories" => []
                        ],
                        [
                            "id" => 2012,
                            "category_id" => 201,
                            "name" => "Micellar Water",
                            "slug" => "micellar-water",
                            "image" => "https://www.herlan.com/wp-content/uploads/2024/12/Olin-Lip-Balm-Front-Lemon-800x800.webp",
                            "product_count" => 4,
                            "uri" => "https://www.herlan.com/product-category/makeup/eyes/eyeliner/",
                            "sub_categories" => []
                        ]
                    ]
                ],
                [
                    "id" => 202,
                    "category_id" => 2,
                    "name" => "Moisturizer",
                    "slug" => "moisturizers",
                    "image" => "https://www.herlan.com/wp-content/uploads/2024/12/Olin-Lip-Balm-Front-Lemon-800x800.webp",
                    "product_count" => 40,
                    "uri" => "https://www.herlan.com/product-category/makeup/eyes/eyeliner/",
                    "sub_categories" => []
                ]
            ]
        ]
    ];
    return response()->json($data);
});
