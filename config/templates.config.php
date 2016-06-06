<?php

return [
    // Zend Framework Configuration
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/layout'             => __DIR__ . '/../view/layout/layout.phtml',
            'template/footer'           => __DIR__ . '/../view/layout/partial/footer.phtml',
            'template/navigation'       => __DIR__ . '/../view/layout/partial/navigation.phtml',
            'template/breadcrumbs'      => __DIR__ . '/../view/layout/partial/breadcrumbs.phtml',
            'site/index/index'          => __DIR__ . '/../view/site/index/index.phtml',
            'error/404'                 => __DIR__ . '/../view/error/404.phtml',
            'error/index'               => __DIR__ . '/../view/error/index.phtml',
        ],
        'template_path_stack' => [
            'site' => __DIR__ . '/../view',
        ],
    ],
    
    // Zend Expressive Configuration
    'templates'     => [
        'display_not_found_reason'  => true,
        'display_exceptions'        => true,
        'doctype'                   => 'HTML5',
        'not_found_template'        => 'error/404',
        'exception_template'        => 'error/index',
        'layout'                    => "layout/layout",
        'map'       => [
            'layout/layout'             => __DIR__ . '/../view/layout/layout.phtml',
            'template/footer'           => __DIR__ . '/../view/layout/partial/footer.phtml',
            'template/navigation'       => __DIR__ . '/../view/layout/partial/navigation.phtml',
            'template/breadcrumbs'      => __DIR__ . '/../view/layout/partial/breadcrumbs.phtml',
            'site/index/index'   => __DIR__ . '/../view/site/index/index.phtml',
            'error/404'                 => __DIR__ . '/../view/error/404.phtml',
            'error/index'               => __DIR__ . '/../view/error/index.phtml',
        ],
        'paths'     => [
            'application'  => [__DIR__ . '/../view/page']
        ]
    ],
    
    /**
     * Zend View Helpers
     */
    'view_helpers'  => [
        'aliases'       => [],
        'invokables'    => [],
        'factories'     => []
    ]
];
