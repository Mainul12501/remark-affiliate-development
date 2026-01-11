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
            "category_id" => null,
            "image" => "https://picsum.photos/400?random=1",
            "product_count" => 304,
            "uri" => "https://www.herlan.com/product-category/makeup/eyes/eyeliner/1",
            "sub_categories" => [
                [
                    "id" => 101,
                    "category_id" => 1,
                    "name" => "Face",
                    "slug" => "makeup-face",
                    "image" => "https://picsum.photos/400?random=2",
                    "product_count" => 50,
                    "uri" => "https://www.herlan.com/product-category/makeup/eyes/eyeliner/2",
                    "sub_categories" => [
                        [
                            "id" => 1011,
                            "category_id" => 101,
                            "name" => "Foundation",
                            "slug" => "foundation",
                            "image" => "https://picsum.photos/400?random=3",
                            "product_count" => 12,
                            "uri" => "https://www.herlan.com/product-category/makeup/eyes/eyeliner/3",
                            "sub_categories" => []
                        ],
                    ]
                ],
                [
                    "id" => 102,
                    "category_id" => 1,
                    "name" => "Lips",
                    "slug" => "makeup-lips",
                    "image" => "https://picsum.photos/400?random=4",
                    "product_count" => 110,
                    "uri" => "https://www.herlan.com/product-category/makeup/eyes/eyeliner/11",
                    "sub_categories" => []
                ]
            ]
        ],
        [
            "id" => 2,
            "name" => "Skin Care",
            "slug" => "skin-care",
            "category_id" => null,
            "image" => "https://picsum.photos/400?random=5",
            "product_count" => 162,
            "uri" => "https://www.herlan.com/product-category/makeup/eyes/eyeliner/122",
            "sub_categories" => [
                [
                    "id" => 201,
                    "category_id" => 2,
                    "name" => "Cleanser",
                    "slug" => "cleanser",
                    "image" => "https://picsum.photos/400?random=",
                    "product_count" => 35,
                    "uri" => "https://www.herlan.com/product-category/makeup/eyes/eyeliner/33",
                    "sub_categories" => [
                        [
                            "id" => 2011,
                            "category_id" => 201,
                            "name" => "Face Wash",
                            "slug" => "face-wash",
                            "image" => "https://picsum.photos/400?random=6",
                            "product_count" => 16,
                            "uri" => "https://www.herlan.com/product-category/makeup/eyes/eyeliner/231",
                            "sub_categories" => []
                        ],
                        [
                            "id" => 2012,
                            "category_id" => 201,
                            "name" => "Micellar Water",
                            "slug" => "micellar-water",
                            "image" => "https://picsum.photos/400?random=7",
                            "product_count" => 4,
                            "uri" => "https://www.herlan.com/product-category/makeup/eyes/eyeliner/132",
                            "sub_categories" => []
                        ]
                    ]
                ],
                [
                    "id" => 202,
                    "category_id" => 2,
                    "name" => "Moisturizer",
                    "slug" => "moisturizers",
                    "image" => "https://picsum.photos/400?random=8",
                    "product_count" => 40,
                    "uri" => "https://www.herlan.com/product-category/makeup/eyes/eyeliner/1232423",
                    "sub_categories" => []
                ]
            ]
        ]
    ];
    return response()->json($data);
});

Route::get('herlan-product-list', function () {

    $data = [

        // Skin Care > Moisturizer
        [
            "id" => 49051,
            "name" => "Nior Aqua Splash Sunscreen SPF 50 50ml",
            "slug" => "nior-aqua-splash-sunscreen-spf-50-50ml",
            "permalink" => "https://www.herlan.com/product/nior-aqua-splash-sunscreen-spf-50-50ml/",
            "status" => "publish",
            "short_description" => "A high-performance sunscreen that offers SPF 50 protection with a lightweight, hydrating formula.",
            "sku" => "1600005005",
            "price" => 665,
            "regular_price" => "950",
            "sale_price" => "665",

            "categories" => [
                [
                    "id" => 202,
                    "name" => "Moisturizer",
                    "slug" => "moisturizers",
                    "category_id" => 2,
                    "image" => "https://picsum.photos/400?random=8",
                    "product_count" => 40,
                    "uri" => "https://www.herlan.com/product-category/skin-care/moisturizer/"
                ]
            ],

            "brand" => [
                "id" => 210,
                "name" => "Nior",
                "slug" => "nior",
                "logo" => "https://www.herlan.com/wp-content/uploads/2023/brand-logos/nior.png"
            ],

            "images" => [
                [
                    "id" => "60001",
                    "src" => "https://picsum.photos/400?random=10",
                    "name" => "Nior Sunscreen Front",
                    "alt" => "Nior Aqua Splash Sunscreen",
                    "position" => 0
                ]
            ]
        ],

        // Makeup > Lips
        [
            "id" => 49052,
            "name" => "Lily Satin Lipstick – Dawn",
            "slug" => "lily-satin-lipstick-dawn",
            "permalink" => "https://www.herlan.com/product/lily-satin-lipstick-dawn/",
            "status" => "publish",
            "short_description" => "Luxuriously smooth satin finish lipstick with long-lasting pigment and moisture.",
            "sku" => "1100001001",
            "price" => 175,
            "regular_price" => "350",
            "sale_price" => "175",

            "categories" => [
                [
                    "id" => 102,
                    "name" => "Lips",
                    "slug" => "makeup-lips",
                    "category_id" => 1,
                    "image" => "https://picsum.photos/400?random=4",
                    "product_count" => 110,
                    "uri" => "https://www.herlan.com/product-category/makeup/lips/"
                ]
            ],

            "brand" => [
                "id" => 201,
                "name" => "Lily",
                "slug" => "lily",
                "logo" => "https://www.herlan.com/wp-content/uploads/2023/brand-logos/lily.png"
            ],

            "images" => [
                [
                    "id" => "60002",
                    "src" => "https://picsum.photos/400?random=11",
                    "name" => "Lily Dawn Lipstick",
                    "alt" => "Lily Satin Lipstick Dawn Shade",
                    "position" => 0
                ]
            ]
        ],

        // ❌ INTENTIONALLY MISMATCHED CATEGORY (TEST CASE)
        [
            "id" => 49053,
            "name" => "Blaze O' Skin Shower Gel: Berry On Top 250ml",
            "slug" => "blaze-o-skin-shower-gel-berry-on-top-250ml",
            "permalink" => "https://www.herlan.com/product/blaze-o-skin-shower-gel-berry-on-top-250ml/",
            "status" => "publish",
            "short_description" => "An energizing shower gel with a delightful berry scent.",
            "sku" => "1400002002",
            "price" => 280,
            "regular_price" => "400",
            "sale_price" => "280",

            "categories" => [
                [
                    "id" => 999,
                    "name" => "Body Care",
                    "slug" => "body-care",
                    "category_id" => null,
                    "image" => "https://picsum.photos/400?random=99",
                    "product_count" => 0,
                    "uri" => "#"
                ]
            ],

            "brand" => [
                "id" => 278,
                "name" => "Blaze O' Skin",
                "slug" => "blaze-o-skin",
                "logo" => "https://www.herlan.com/wp-content/uploads/2023/brand-logos/blazeoskin.png"
            ],

            "images" => [
                [
                    "id" => "60003",
                    "src" => "https://picsum.photos/400?random=12",
                    "name" => "Blaze O Skin Shower Gel",
                    "alt" => "Berry On Top Shower Gel",
                    "position" => 0
                ]
            ]
        ],

        // Skin Care > Cleanser
        [
            "id" => 49054,
            "name" => "Siodil Sebi Cleanser 100ml",
            "slug" => "siodil-sebi-cleanser-100ml",
            "permalink" => "https://www.herlan.com/product/siodil-sebi-cleanser-100ml/",
            "status" => "publish",
            "short_description" => "Medicated cleanser designed for oily and acne-prone skin types.",
            "sku" => "1500004004",
            "price" => 1290,

            "categories" => [
                [
                    "id" => 201,
                    "name" => "Cleanser",
                    "slug" => "cleanser",
                    "category_id" => 2,
                    "image" => "https://picsum.photos/400?random=6",
                    "product_count" => 35,
                    "uri" => "https://www.herlan.com/product-category/skin-care/cleanser/"
                ]
            ],

            "brand" => [
                "id" => 205,
                "name" => "Siodil",
                "slug" => "siodil",
                "logo" => "https://www.herlan.com/wp-content/uploads/2023/brand-logos/siodil.png"
            ],

            "images" => [
                [
                    "id" => "60004",
                    "src" => "https://picsum.photos/400?random=15",
                    "name" => "Siodil Cleanser",
                    "alt" => "Siodil Sebi Cleanser",
                    "position" => 0
                ]
            ]
        ],

        // Skin Care > Cleanser > Face Wash
        [
            "id" => 49057,
            "name" => "Lily Aloe Facewash 100ml",
            "slug" => "lily-aloe-facewash-100ml",
            "permalink" => "https://www.herlan.com/product/lily-aloe-facewash-100ml/",
            "status" => "publish",
            "short_description" => "Soothing aloe vera face wash for daily gentle cleansing.",
            "sku" => "1100003003",
            "price" => 99,

            "categories" => [
                [
                    "id" => 2011,
                    "name" => "Face Wash",
                    "slug" => "face-wash",
                    "category_id" => 201,
                    "image" => "https://picsum.photos/400?random=6",
                    "product_count" => 16,
                    "uri" => "https://www.herlan.com/product-category/skin-care/cleanser/face-wash/"
                ]
            ],

            "brand" => [
                "id" => 201,
                "name" => "Lily",
                "slug" => "lily",
                "logo" => "https://www.herlan.com/wp-content/uploads/2023/brand-logos/lily.png"
            ],

            "images" => [
                [
                    "id" => "60007",
                    "src" => "https://picsum.photos/400?random=18",
                    "name" => "Lily Aloe Facewash",
                    "alt" => "Aloe Vera Face Wash",
                    "position" => 0
                ]
            ]
        ]
    ];

    return response()->json($data);
});
