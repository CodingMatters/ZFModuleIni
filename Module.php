<?php

/**
 * The MIT License
 *
 * Copyright (c) 2014, contributors of Coding Matters.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\ModuleManager;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

/**
 * Application\Module
 *
 * @package Application
 */
class Module implements
    AutoloaderProviderInterface,
    ServiceProviderInterface,
    ConfigProviderInterface,
    ControllerProviderInterface
{

    public function onBootstrap(MvcEvent $event)
    {
        $application = $event->getApplication();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($application->getEventManager());

        $seviceManager = $application->getServiceManager();
        $applicationVariables = $seviceManager->get('myapp_module_options');

        $myapp = $applicationVariables->toArray();

        $viewModel = $event->getViewModel();
        $viewModel->setVariables($myapp);
    }

    public function getConfig()
    {
        $config      = [];
        $configFiles = [
            'module.config.php',
            'routes.config.php',
            'navigation.config.php'
        ];

        foreach ($configFiles as $configFile) {
            $config = \Zend\Stdlib\ArrayUtils::merge($config, include  __DIR__ .'/config/'. $configFile);
        }

        return $config;
    }

    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ]
            ]
        ];
    }

    public function getControllerConfig()
    {
        return include __DIR__ . '/config/controllers.config.php';
    }

    public function getServiceConfig()
    {
        return include __DIR__ . '/config/services.config.php';
    }
}
