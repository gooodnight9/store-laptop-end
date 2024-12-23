<?php

return [
    'default' => 'default',
    'documentations' => [
        'default' => [
            'api' => [
                'title' => 'L5 Swagger UI',
            ],

            'routes' => [
                'api' => 'api/documentation',  // Route truy cập giao diện tài liệu API
            ],

            'paths' => [
                'use_absolute_path' => env('L5_SWAGGER_USE_ABSOLUTE_PATH', true), // Cấu hình URL tuyệt đối
                'swagger_ui_assets_path' => env('L5_SWAGGER_UI_ASSETS_PATH', 'vendor/swagger-api/swagger-ui/dist/'), // Đường dẫn tài sản Swagger UI
                'docs_json' => 'api-docs.json', // Tên file tài liệu Swagger JSON
                'docs_yaml' => 'api-docs.yaml', // Tên file tài liệu Swagger YAML
                'format_to_use_for_docs' => env('L5_FORMAT_TO_USE_FOR_DOCS', 'json'), // Định dạng tài liệu (JSON hoặc YAML)
                'annotations' => [
                    base_path('app'), // Quét qua thư mục `app` của Laravel (có thể thêm các thư mục khác nếu cần)
                ],
            ],
        ],
    ],
    'defaults' => [
        'routes' => [
            'docs' => 'docs',  // Route cho tài liệu Swagger đã được xử lý
            'oauth2_callback' => 'api/oauth2-callback', // Callback OAuth2
            'middleware' => [
                'api' => [],
                'asset' => [],
                'docs' => [],
                'oauth2_callback' => [],
            ],
            'group_options' => [],
        ],

        'paths' => [
            'docs' => storage_path('api-docs'), // Đường dẫn lưu trữ tài liệu Swagger JSON
            'views' => base_path('resources/views/vendor/l5-swagger'), // Đường dẫn xuất các views của Swagger UI
            'base' => env('L5_SWAGGER_BASE_PATH', '/api'), // Cấu hình base URL cho API
            'excludes' => [
                base_path('tests'),  // Bỏ qua thư mục tests
                base_path('node_modules'),  // Bỏ qua thư mục node_modules
            ],
        ],

        'scan' => [
            'enabled' => env('SWAGGER_SCAN_ENABLED', true),
            'paths' => [
                base_path('app/Http/Controllers'), // Quét tất cả các controller
            ],
        ],


        'securityDefinitions' => [
            'securitySchemes' => [
                'passport' => [
                    'type' => 'oauth2',
                    'description' => 'Laravel passport oauth2 security.',
                    'in' => 'header',
                    'scheme' => 'https',
                    'flows' => [
                        "password" => [
                            "authorizationUrl" => config('app.url') . '/oauth/authorize',
                            "tokenUrl" => config('app.url') . '/oauth/token',
                            "scopes" => []
                        ],
                    ],
                ],
                'sanctum' => [
                    'type' => 'apiKey',
                    'description' => 'Enter token in format (Bearer <token>)',
                    'name' => 'Authorization',
                    'in' => 'header',
                ],
            ],
            'security' => [],
        ],

        'generate_always' => env('L5_SWAGGER_GENERATE_ALWAYS', false), // Tự động tạo lại tài liệu Swagger
        'generate_yaml_copy' => env('L5_SWAGGER_GENERATE_YAML_COPY', false), // Tạo bản sao tài liệu Swagger dưới định dạng YAML

        'proxy' => false, // Cấu hình proxy nếu cần

        'additional_config_url' => null, // Thêm cấu hình URL ngoài Swagger UI

        'operations_sort' => env('L5_SWAGGER_OPERATIONS_SORT', null), // Sắp xếp các operations theo tên hoặc phương thức HTTP

        'validator_url' => null, // Địa chỉ URL xác thực Swagger UI

        'ui' => [
            'display' => [
                'dark_mode' => env('L5_SWAGGER_UI_DARK_MODE', false),
                'doc_expansion' => env('L5_SWAGGER_UI_DOC_EXPANSION', 'none'),
                'filter' => env('L5_SWAGGER_UI_FILTERS', true),
            ],

            'authorization' => [
                'persist_authorization' => env('L5_SWAGGER_UI_PERSIST_AUTHORIZATION', false),
                'oauth2' => [
                    'use_pkce_with_authorization_code_grant' => false,
                ],
            ],
        ],

        'constants' => [
            'L5_SWAGGER_CONST_HOST' => env('L5_SWAGGER_CONST_HOST', 'http://my-default-host.com'),
        ],
    ],
];
