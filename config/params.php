<?php

return [
    'adminEmail' => 'admin@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'frontend' => 'http://e-shop/',
    'bsDependencyEnabled' => false,
    'brands' => [
        1 => 'Samsung',
        2 => 'Huawei',
        3 => 'Apple',
        4 => 'Xiaomi',
        5 => 'Artel',
        6 => 'Vivo',
        7 => 'Innoi'
    ],
    'menu_positions' => [
        1 => 'MAIN_MENU',
        2 => 'FOOTER_MENU'
    ],
    'banner_positions' => [
        1 => 'MAIN_SLIDER',
        2 => 'SECOND_SLIDER',
        3 => 'SIDEBAR_BANNER',
        4 => 'POST_INNER_BANNER'
    ],
    'user_statuses' => [
        1 => 'ADMIN',
        1000 => 'USER_ACTIVATED',
        2000 => 'USER_NOT_ACTIVATED'
    ],
    'sms_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9ub3RpZnkuZXNraXoudXpcL2FwaVwvYXV0aFwvbG9naW4iLCJpYXQiOjE2MzQ5MDcyNjIsImV4cCI6MTYzNzQ5OTI2MiwibmJmIjoxNjM0OTA3MjYyLCJqdGkiOiJEcGhwMFVGY3N2ekhyT1c2Iiwic3ViIjo1NiwicHJ2IjoiODdlMGFmMWVmOWZkMTU4MTJmZGVjOTcxNTNhMTRlMGIwNDc1NDZhYSJ9.7Yu-7vo1kG9OYGhnRplma1_DlO0dylFoOoup1Sq8NFQ',
    'delivery_type' => [
        1 => 'Самовывоз',
        2 => 'Служобой доставки'
    ],
    'payment_type' => [
        1 => 'Пластиковой картой',
        2 => 'Наличнимы',
        3 => 'Payme',
    ],
    'order_status' => [
        1 => 'Заказ создан',
        2 => 'Заказ подтвержден',
        3 => 'Заказ успешно выполнено',
        4 => 'Заказ провалено(отменено)'
    ],

    'okrugs' => [
        1 => "2 - Shifokor Okrugi (Xikmat Boboqulovich)",
        2 => "9 - Bog'ishamol okrugi (Moxira Raxmatullaevna)",
        3 => "16 - Turon okrugi (Lapasova Oynabod)",
        4 => "16 - Amus Sohil okrugi (Abjalov Farrux)",
        5 => "21 - Guliston okrugi (Baxtiyor Xolto'rayevich)",
        6 => "23 - Mehrobod Okrugi (Panji Abduxoliqovich)"
    ],
    'problem_status' => [
        1 => 'Tanishilmagan',
        2 => 'Tanishildi',
        3 => 'Hal qilinmadi',
        4 => 'Muvaffaqiyatli hal qilindi',
        5 => "Ko'rib chiqish uchun yuborildi"
    ]
];
