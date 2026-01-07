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
            "image" => "https://www.herlan.com/wp-content/uploads/2024/12/Olin-Lip-Balm-Front-Lemon-800x800.webp",
            "product_count" => 304,
            "uri" => "https://www.herlan.com/product-category/makeup/eyes/eyeliner/1",
            "sub_categories" => [
                [
                    "id" => 101,
                    "category_id" => 1,
                    "name" => "Face",
                    "slug" => "makeup-face",
                    "image" => "https://www.herlan.com/wp-content/uploads/2024/12/Olin-Lip-Balm-Front-Lemon-800x800.webp",
                    "product_count" => 50,
                    "uri" => "https://www.herlan.com/product-category/makeup/eyes/eyeliner/2",
                    "sub_categories" => [
                        [
                            "id" => 1011,
                            "category_id" => 101,
                            "name" => "Foundation",
                            "slug" => "foundation",
                            "image" => "https://www.herlan.com/wp-content/uploads/2024/12/Olin-Lip-Balm-Front-Lemon-800x800.webp",
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
                    "image" => "https://www.herlan.com/wp-content/uploads/2024/12/Olin-Lip-Balm-Front-Lemon-800x800.webp",
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
            "image" => "https://www.herlan.com/wp-content/uploads/2024/12/Olin-Lip-Balm-Front-Lemon-800x800.webp",
            "product_count" => 162,
            "uri" => "https://www.herlan.com/product-category/makeup/eyes/eyeliner/122",
            "sub_categories" => [
                [
                    "id" => 201,
                    "category_id" => 2,
                    "name" => "Cleanser",
                    "slug" => "cleanser",
                    "image" => "https://www.herlan.com/wp-content/uploads/2024/12/Olin-Lip-Balm-Front-Lemon-800x800.webp",
                    "product_count" => 35,
                    "uri" => "https://www.herlan.com/product-category/makeup/eyes/eyeliner/33",
                    "sub_categories" => [
                        [
                            "id" => 2011,
                            "category_id" => 201,
                            "name" => "Face Wash",
                            "slug" => "face-wash",
                            "image" => "https://www.herlan.com/wp-content/uploads/2024/12/Olin-Lip-Balm-Front-Lemon-800x800.webp",
                            "product_count" => 16,
                            "uri" => "https://www.herlan.com/product-category/makeup/eyes/eyeliner/231",
                            "sub_categories" => []
                        ],
                        [
                            "id" => 2012,
                            "category_id" => 201,
                            "name" => "Micellar Water",
                            "slug" => "micellar-water",
                            "image" => "https://www.herlan.com/wp-content/uploads/2024/12/Olin-Lip-Balm-Front-Lemon-800x800.webp",
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
                    "image" => "https://www.herlan.com/wp-content/uploads/2024/12/Olin-Lip-Balm-Front-Lemon-800x800.webp",
                    "product_count" => 40,
                    "uri" => "https://www.herlan.com/product-category/makeup/eyes/eyeliner/1232423",
                    "sub_categories" => []
                ]
            ]
        ]
    ];
    return response()->json($data);
});

Route::get('herlan-product-list', function (){
    $data = [
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
            "uri" => "https://www.herlan.com/product/lily-whipped-shea-body-wash/",
            "categories" => [
                [
                    "id" => 841,
                    "name" => "Skin Care",
                    "slug" => "skin-care",
                    "category_id" => 101,
                    "image" => "https://www.herlan.com/wp-content/uploads/2024/02/sunscreen-cat.webp",
                    "product_count" => 162,
                    "uri" => "https://www.herlan.com/product-category/skin-care/face-care/sunscreen/"
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
                    "src" => "https://www.herlan.com/wp-content/uploads/nior-sunscreen-1.webp",
                    "name" => "Nior Sunscreen Front",
                    "alt" => "Nior Aqua Splash Sunscreen",
                    "position" => 0
                ]
            ]
        ],
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
            "uri" => "https://www.herlan.com/product/lily-whipped-shea-body-wash/",
            "categories" => [
                [
                    "id" => 801,
                    "name" => "Makeup",
                    "slug" => "makeup",
                    "category_id" => 102,
                    "image" => "https://www.herlan.com/wp-content/uploads/2024/02/makeup-cat.webp",
                    "product_count" => 304,
                    "uri" => "https://www.herlan.com/product-category/makeup/lip/lipstick/"
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
                    "src" => "https://www.herlan.com/wp-content/uploads/lily-satin-dawn.webp",
                    "name" => "Lily Dawn Lipstick",
                    "alt" => "Lily Satin Lipstick Dawn Shade",
                    "position" => 0
                ]
            ]
        ],
        [
            "id" => 49053,
            "name" => "Blaze O' Skin Shower Gel: Berry On Top 250ml",
            "slug" => "blaze-o-skin-shower-gel-berry-on-top-250ml",
            "permalink" => "https://www.herlan.com/product/blaze-o-skin-shower-gel-berry-on-top-250ml/",
            "status" => "publish",
            "short_description" => "An energizing shower gel with a delightful berry scent for a refreshing cleanse.",
            "sku" => "1400002002",
            "price" => 280,
            "regular_price" => "400",
            "sale_price" => "280",
            "uri" => "https://www.herlan.com/product/lily-whipped-shea-body-wash/",
            "categories" => [
                [
                    "id" => 842,
                    "name" => "Body Care",
                    "slug" => "body-care",
                    "category_id" => 103,
                    "image" => "https://www.herlan.com/wp-content/uploads/2024/02/bodycare-cat.webp",
                    "product_count" => 65,
                    "uri" => "https://www.herlan.com/product-category/skin-care/body-care/shower-gel/"
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
                    "src" => "https://www.herlan.com/wp-content/uploads/berry-on-top.webp",
                    "name" => "Blaze O Skin Shower Gel",
                    "alt" => "Berry On Top Shower Gel",
                    "position" => 0
                ]
            ]
        ],
        [
            "id" => 49054,
            "name" => "Siodil Sebi Cleanser 100ml",
            "slug" => "siodil-sebi-cleanser-100ml",
            "permalink" => "https://www.herlan.com/product/siodil-sebi-cleanser-100ml/",
            "status" => "publish",
            "short_description" => "Medicated cleanser designed for oily and acne-prone skin types.",
            "sku" => "1500004004",
            "price" => 1290,
            "regular_price" => "1290",
            "sale_price" => "",
            "uri" => "https://www.herlan.com/product/lily-whipped-shea-body-wash/",
            "categories" => [
                [
                    "id" => 843,
                    "name" => "Face Care",
                    "slug" => "face-care",
                    "category_id" => 101,
                    "image" => "https://www.herlan.com/wp-content/uploads/2024/02/face-care-cat.webp",
                    "product_count" => 83,
                    "uri" => "https://www.herlan.com/product-category/skin-care/face-care/face-wash/"
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
                    "src" => "https://www.herlan.com/wp-content/uploads/siodil-sebi.webp",
                    "name" => "Siodil Cleanser",
                    "alt" => "Siodil Sebi Cleanser 100ml",
                    "position" => 0
                ]
            ]
        ],
        [
            "id" => 49055,
            "name" => "Herlan Airy Matte Liquid Lipstick-Maple Mocha",
            "slug" => "herlan-airy-matte-liquid-lipstick-maple-mocha",
            "permalink" => "https://www.herlan.com/product/herlan-airy-matte-liquid-lipstick-maple-mocha/",
            "status" => "publish",
            "short_description" => "Weightless liquid lipstick that delivers an intense matte finish with maple mocha hues.",
            "sku" => "1700006006",
            "price" => 1013,
            "regular_price" => "1350",
            "sale_price" => "1013",
            "uri" => "https://www.herlan.com/product/lily-whipped-shea-body-wash/",
            "categories" => [
                [
                    "id" => 802,
                    "name" => "Lipstick",
                    "slug" => "lipstick",
                    "category_id" => 102,
                    "image" => "https://www.herlan.com/wp-content/uploads/2024/02/lipstick-cat.webp",
                    "product_count" => 87,
                    "uri" => "https://www.herlan.com/product-category/makeup/lip/lipstick/"
                ]
            ],
            "brand" => [
                "id" => 215,
                "name" => "Herlan",
                "slug" => "herlan",
                "logo" => "https://www.herlan.com/wp-content/uploads/2023/brand-logos/herlan.png"
            ],
            "images" => [
                [
                    "id" => "60005",
                    "src" => "https://www.herlan.com/wp-content/uploads/herlan-mocha.webp",
                    "name" => "Herlan Matte Lipstick",
                    "alt" => "Maple Mocha Liquid Lipstick",
                    "position" => 0
                ]
            ]
        ],
        [
            "id" => 49056,
            "name" => "Skin Mynt Vitamin C Brightening Night Cream 50gm",
            "slug" => "skin-mynt-vitamin-c-brightening-night-cream-50gm",
            "permalink" => "https://www.herlan.com/product/skin-mynt-vitamin-c-brightening-night-cream-50gm/",
            "status" => "publish",
            "short_description" => "Overnight repair cream enriched with Vitamin C for glowing and even-toned skin.",
            "sku" => "1800007007",
            "price" => 546,
            "regular_price" => "780",
            "sale_price" => "546",
            "uri" => "https://www.herlan.com/product/lily-whipped-shea-body-wash/",
            "categories" => [
                [
                    "id" => 843,
                    "name" => "Face Care",
                    "slug" => "face-care",
                    "category_id" => 101,
                    "image" => "https://www.herlan.com/wp-content/uploads/2024/02/night-cream-cat.webp",
                    "product_count" => 83,
                    "uri" => "https://www.herlan.com/product-category/skin-care/face-care/moisturizer/"
                ]
            ],
            "brand" => [
                "id" => 220,
                "name" => "Skin Mynt",
                "slug" => "skin-mynt",
                "logo" => "https://www.herlan.com/wp-content/uploads/2023/brand-logos/skinmynt.png"
            ],
            "images" => [
                [
                    "id" => "60006",
                    "src" => "https://www.herlan.com/wp-content/uploads/skin-mynt-night.webp",
                    "name" => "Skin Mynt Night Cream",
                    "alt" => "Vitamin C Night Cream",
                    "position" => 0
                ]
            ]
        ],
        [
            "id" => 49057,
            "name" => "Lily Aloe Facewash 100ml",
            "slug" => "lily-aloe-facewash-100ml",
            "permalink" => "https://www.herlan.com/product/lily-aloe-facewash-100ml/",
            "status" => "publish",
            "short_description" => "Soothing aloe vera face wash for daily gentle cleansing.",
            "sku" => "1100003003",
            "price" => 99,
            "regular_price" => "150",
            "sale_price" => "99",
            "uri" => "https://www.herlan.com/product/lily-whipped-shea-body-wash/",
            "categories" => [
                [
                    "id" => 843,
                    "name" => "Face Care",
                    "slug" => "face-care",
                    "category_id" => 101,
                    "image" => "https://www.herlan.com/wp-content/uploads/2024/02/facewash-cat.webp",
                    "product_count" => 16,
                    "uri" => "https://www.herlan.com/product-category/skin-care/face-care/face-wash/"
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
                    "src" => "https://www.herlan.com/wp-content/uploads/lily-aloe-fw.webp",
                    "name" => "Lily Aloe Facewash",
                    "alt" => "Aloe Vera Face Wash",
                    "position" => 0
                ]
            ]
        ],
        [
            "id" => 49058,
            "name" => "NIOR No Transfer Retro Matte Lipstick Orchid Obsession 14",
            "slug" => "nior-no-transfer-retro-matte-lipstick-orchid-obsession-14",
            "permalink" => "https://www.herlan.com/product/nior-no-transfer-retro-matte-lipstick-orchid-obsession-14/",
            "status" => "publish",
            "short_description" => "A deep orchid shade with a zero-transfer matte finish.",
            "sku" => "1600010010",
            "price" => 850,
            "regular_price" => "850",
            "sale_price" => "",
            "uri" => "https://www.herlan.com/product/lily-whipped-shea-body-wash/",
            "categories" => [
                [
                    "id" => 802,
                    "name" => "Lipstick",
                    "slug" => "lipstick",
                    "category_id" => 102,
                    "image" => "https://www.herlan.com/wp-content/uploads/2024/02/lipstick-cat.webp",
                    "product_count" => 87,
                    "uri" => "https://www.herlan.com/product-category/makeup/lip/lipstick/"
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
                    "id" => "60008",
                    "src" => "https://www.herlan.com/wp-content/uploads/orchid-obsession.webp",
                    "name" => "Nior Retro Matte",
                    "alt" => "Nior Orchid Obsession Lipstick",
                    "position" => 0
                ]
            ]
        ],
        [
            "id" => 49059,
            "name" => "Acnol Body Wash – Real Aloe 500 ml",
            "slug" => "acnol-body-wash-real-aloe-500-ml",
            "permalink" => "https://www.herlan.com/product/acnol-body-wash-real-aloe-500-ml/",
            "status" => "publish",
            "short_description" => "Antibacterial body wash with real aloe extracts to keep skin healthy and clean.",
            "sku" => "1900012012",
            "price" => 285,
            "regular_price" => "380",
            "sale_price" => "285",
            "uri" => "https://www.herlan.com/product/lily-whipped-shea-body-wash/",
            "categories" => [
                [
                    "id" => 842,
                    "name" => "Body Care",
                    "slug" => "body-care",
                    "category_id" => 103,
                    "image" => "https://www.herlan.com/wp-content/uploads/2024/02/body-wash-cat.webp",
                    "product_count" => 65,
                    "uri" => "https://www.herlan.com/product-category/skin-care/body-care/shower-gel/"
                ]
            ],
            "brand" => [
                "id" => 230,
                "name" => "Acnol",
                "slug" => "acnol",
                "logo" => "https://www.herlan.com/wp-content/uploads/2023/brand-logos/acnol.png"
            ],
            "images" => [
                [
                    "id" => "60009",
                    "src" => "https://www.herlan.com/wp-content/uploads/acnol-aloe-body.webp",
                    "name" => "Acnol Body Wash",
                    "alt" => "Acnol Real Aloe 500ml",
                    "position" => 0
                ]
            ]
        ],
        [
            "id" => 49060,
            "name" => "Lily Winter Butter Moisturizing Skin Lotion 100ml",
            "slug" => "lily-winter-butter-moisturizing-skin-lotion-100ml",
            "permalink" => "https://www.herlan.com/product/lily-winter-butter-moisturizing-skin-lotion-100ml/",
            "status" => "publish",
            "short_description" => "Intensive winter care lotion for deep skin hydration and nourishment.",
            "sku" => "1100014014",
            "price" => 180,
            "regular_price" => "240",
            "sale_price" => "180",
            "uri" => "https://www.herlan.com/product/lily-whipped-shea-body-wash/",
            "categories" => [
                [
                    "id" => 842,
                    "name" => "Body Care",
                    "slug" => "body-care",
                    "category_id" => 103,
                    "image" => "https://www.herlan.com/wp-content/uploads/2024/02/lotion-cat.webp",
                    "product_count" => 17,
                    "uri" => "https://www.herlan.com/product-category/skin-care/body-care/body-lotion/"
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
                    "id" => "60010",
                    "src" => "https://www.herlan.com/wp-content/uploads/lily-winter-lotion.webp",
                    "name" => "Lily Winter Lotion",
                    "alt" => "Lily Moisturizing Lotion 100ml",
                    "position" => 0
                ]
            ]
        ]
    ];

    return response()->json($data);
});
