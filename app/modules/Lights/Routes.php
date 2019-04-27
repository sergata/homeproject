<?php

/**
 * Routes
 * @copyright Copyright (c) 2011 - 2014 Aleksandr Torosh (http://wezoom.com.ua)
 * @author Aleksandr Torosh <webtorua@gmail.com>
 */

namespace Lights;

use Application\Mvc\Router\DefaultRouter;

class Routes
{

    public function init(DefaultRouter $router)
    {
        $router->addML('/admin/lights', array(
            'module' => 'lights',
            'controller' => 'index',
            'action' => 'index'
        ), 'page');

        $router->addML('lights', array(
            'module' => 'lights',
            'controller' => 'index',
            'action' => 'contacts',
        ), 'contacts');

        return $router;

    }

}