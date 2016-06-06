<?php

/**
 * Most of the routing definitions will be done in module configuration files.
 * 
 * @see https://zendframework.github.io/zend-router/routing/
 */

use Zend\Router\Http\Literal;
use Site\Controller;

return [
    'home' => [
        'type'      => Literal::class,
        'options'   => [
            'route'     => '/',
            'defaults'  => [
                'controller'    => Controller\IndexController::class,
                'action'        => 'index'
            ]
        ]
    ],
//    'about' => [
//        'type'      => Literal::class,
//        'options'   => [
//            'route'     => '/about',
//            'defaults'  => [
//                'controller'    => Controller\IndexController::class,
//                'action'        => 'about'
//            ]
//        ]
//    ],
//            'maintenance' => [
//                'type'      => 'Zend\Mvc\Router\Http\Literal',
//                'options'   => [
//                    'route'     => '/under-construction',
//                    'defaults'  => [
//                        'controller'    => 'Application\Controller\Index',
//                        'action'        => 'maintenance'
//                    ]
//                ]
//            ]
];
