<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Labels Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used in labels throughout the system.
    | Regardless where it is placed, a label can be listed here so it is easily
    | found in a intuitive way.
    |
    */

    'general' => [
        'all'     => 'Hepsi',
        'yes'     => 'Evet',
        'no'      => 'HayÄ±r',
        'custom'  => 'Ã–zel',
        'actions' => 'Ä°ÅŸlemler',
        'active'  => 'Etkin',
        'buttons' => [
            'save'   => 'Kaydet',
            'update' => 'GÃ¼ncelle',
        ],
        'hide'              => 'Gizle',
        'inactive'          => 'Etkin deÄŸil',
        'none'              => 'HiÃ§biri',
        'show'              => 'GÃ¶ster',
        'toggle_navigation' => 'Navigasyon AÃ§Ä±k',
    ],

    'backend' => [
        'access' => [
            'roles' => [
                'create'     => 'Rol OluÅŸtur',
                'edit'       => 'Rol DÃ¼zenle',
                'management' => 'Rol YÃ¶netimi',

                'table' => [
                    'number_of_users' => 'KullanÄ±cÄ± SayÄ±sÄ±',
                    'permissions'     => 'Ä°zinler',
                    'role'            => 'Rol',
                    'sort'            => 'SÄ±ralama',
                    'total'           => 'rol toplam|roller toplam',
                ],
            ],

            'users' => [
                'active'              => 'Aktif KullanÄ±cÄ±lar',
                'all_permissions'     => 'TÃ¼m Ä°zinler',
                'change_password'     => 'ParolayÄ± DeÄŸiÅŸtir',
                'change_password_for' => 'KullanÄ±cÄ± :user parolasÄ±nÄ± deÄŸiÅŸtir',
                'create'              => 'KullanÄ±cÄ± OluÅŸtur',
                'deactivated'         => 'Devre DÄ±ÅŸÄ± BÄ±rakÄ±lan KullanÄ±cÄ±lar',
                'deleted'             => 'SilinmiÅŸ KullanÄ±cÄ±lar',
                'edit'                => 'KullanÄ±cÄ± DÃ¼zenle',
                'management'          => 'KullanÄ±cÄ± YÃ¶netimi',
                'no_permissions'      => 'Ä°zin yok.',
                'no_roles'            => 'Ayarlanacak Rol yok.',
                'permissions'         => 'Ä°zinler',

                'table' => [
                    'confirmed'      => 'OnaylandÄ±',
                    'created'        => 'OluÅŸturuldu',
                    'email'          => 'E-posta',
                    'id'             => 'ID',
                    'last_updated'   => 'Son GÃ¼ncelleme',
                    'name'           => 'Ä°sim',
                    'first_name'     => 'Ad',
                    'telefon_no'     => 'Telefon Numarası',
                    'dogum_tarihi'     => 'Doğum Tarihi',
                    'last_name'      => 'Soyad',
                    'no_deactivated' => 'Devre DÄ±ÅŸÄ± BÄ±rakÄ±lan KullanÄ±cÄ± Yok',
                    'no_deleted'     => 'SilinmiÅŸ KullanÄ±cÄ± Yok',
                    'roles'          => 'Roller',
                    'social' => 'Social',
                    'total'          => 'toplam kullanÄ±cÄ±|toplam kullanÄ±cÄ±lar',
                ],

                'tabs' => [
                    'titles' => [
                        'overview' => 'Genel BakÄ±ÅŸ',
                        'history'  => 'GeÃ§miÅŸ',
                    ],

                    'content' => [
                        'overview' => [
                            'avatar'       => 'Avatar',
                            'confirmed'    => 'OnaylandÄ±',
                            'created_at'   => 'OluÅŸturulma',
                            'deleted_at'   => 'Silinme',
                            'email'        => 'E-posta',
                            'last_updated' => 'Son GÃ¼ncellenme',
                            'name'         => 'Ä°sim',
                            'first_name'   => 'Ad',
                            'last_name'    => 'Soyad',
                            'status'       => 'Durum',
                        ],
                    ],
                ],

                'view' => 'KullanÄ±cÄ±yÄ± GÃ¶ster',
            ],
        ],
    ],

    'frontend' => [

        'auth' => [
            'login_box_title'    => 'GiriÅŸ',
            'login_button'       => 'GiriÅŸ',
            'login_with'         => 'Å�ununla Gir :social_media',
            'register_box_title' => 'KayÄ±t',
            'register_button'    => 'KayÄ±t',
            'remember_me'        => 'Beni HatÄ±rla',
        ],

        'contact' => [
            'box_title' => 'Contact Us',
            'button' => 'Send Information',
        ],

        'passwords' => [
            'forgot_password'                 => 'ParolanÄ±zÄ± mÄ± Unuttunuz?',
            'reset_password_box_title'        => 'Parola SÄ±fÄ±rla',
            'reset_password_button'           => 'Parola SÄ±fÄ±rla',
            'send_password_reset_link_button' => 'ParolayÄ± SÄ±fÄ±rlama BaÄŸlantÄ±sÄ± GÃ¶nder',
        ],

        'user' => [
            'passwords' => [
                'change' => 'ParolayÄ± deÄŸiÅŸtir',
            ],

            'profile' => [
                'avatar'             => 'Avatar',
                'created_at'         => 'OluÅŸturulma',
                'edit_information'   => 'Bilgileri DÃ¼zenle',
                'email'              => 'E-posta',
                'last_updated'       => 'Son GÃ¼ncelleme',
                'name'               => 'Ä°sim',
                'first_name'         => 'Ad',
                'last_name'          => 'Soyad',
                'update_information' => 'Bilgileri GÃ¼ncelle',
            ],
        ],

    ],
];
