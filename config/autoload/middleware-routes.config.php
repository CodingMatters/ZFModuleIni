<?php

use Application;
use CodingMatters\Kernel;

return [
    "dependencies" =>  [
        'aliases'       => [],
        'invokables'    => [],
        'factories'     => [
            Enrollment\Page\IndexPage::class => Kernel\Factory\PageFactory::class
        ],
    ],
    'routes' => [
        [
            'name' => 'enrollment',
            'path' => '/enrollment',
            'middleware' => Enrollment\Page\IndexPage::class,
            'allowed_methods' => ['GET'],
        ]
    ]
];
