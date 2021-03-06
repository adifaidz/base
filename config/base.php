<?php

/**
 * This file is part of AdiFaidz\Base wrapper of Base,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package Base
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Project Name
    |--------------------------------------------------------------------------
    */
    'name' => 'CHART',

    /*
    |--------------------------------------------------------------------------
    | Project Logo
    |--------------------------------------------------------------------------
    */
    'logo' => '<i class="fa fa-bell-o" aria-hidden="true"></i>',

    /*
    |--------------------------------------------------------------------------
    | Base App Javascript Path
    |
    | For generated vue components to be registered in
    |--------------------------------------------------------------------------
    */
    'app_js_path' => base_path('resources\assets\js\base_app.js'),

    /*
    |--------------------------------------------------------------------------
    | Prefix for all admin routes in  admin file
    |--------------------------------------------------------------------------
    */
    'admin_route_prefix' => 'admin',

    /*
    |--------------------------------------------------------------------------
    | Admin route file path
    |--------------------------------------------------------------------------
    */
    'admin_route' => base_path('routes/admin.php'),

    /*
    |--------------------------------------------------------------------------
    | Prefix for all admin routes in  admin file
    |--------------------------------------------------------------------------
    */
    'client_route_prefix' => '',

    /*
    |--------------------------------------------------------------------------
    | Client route file path
    |--------------------------------------------------------------------------
    */
    'client_route' => base_path('routes/client.php'),

    /*
    |--------------------------------------------------------------------------
    | Admin auth guard (If changed, also need to change middleware group array)
    |--------------------------------------------------------------------------
    */
    'admin_guard' => 'web_admin',

    /*
    |--------------------------------------------------------------------------
    | Client auth guard (If changed, also need to change middleware group array)
    |--------------------------------------------------------------------------
    */
    'client_guard' => 'web_client',

    /*
    |--------------------------------------------------------------------------
    | Redirect configuration
    |--------------------------------------------------------------------------
    */
    'redirect' => [

        /*
        |--------------------------------------------------------------------------
        | Default route name for handling unauthorized redirection
        |--------------------------------------------------------------------------
        */
        'unauth_default' => 'client.login',

        /*
        |--------------------------------------------------------------------------
        |  Route name for handling unauthorized redirection for admin side pages
        |--------------------------------------------------------------------------
        */
        'unauth_admin' => 'admin.login',

        /*
        |--------------------------------------------------------------------------
        |  Route name for handling unauthorized redirection for client side pages
        |--------------------------------------------------------------------------
        */
        'unauth_client' => 'client.login',

        /*
        |--------------------------------------------------------------------------
        | Default route name for handling if authorized redirection
        |--------------------------------------------------------------------------
        */
        'auth_default' => 'client.home',

        /*
        |--------------------------------------------------------------------------
        |  Route name for handling if authorized redirection for admin side pages
        |--------------------------------------------------------------------------
        */
        'auth_admin' => 'admin.home',

        /*
        |--------------------------------------------------------------------------
        |  Route name for handling if authorized redirection for client side pages
        |--------------------------------------------------------------------------
        */
        'auth_client' => 'client.home',

    ],

    /*
    |--------------------------------------------------------------------------
    | Base View Stubs
    |--------------------------------------------------------------------------
    */
    'stubs' => [
      /*
      | This is the stub folder used for view generation, leave null to use the default views.
      */
      'view' => null,

      /*
      | This is the stub folder used for vue generation, leave null to use the default views.
      */
      'vue'  => null,
    ],

    /*
    |--------------------------------------------------------------------------
    | Development environment for provider registration
    |--------------------------------------------------------------------------
    */
    'dev_env' => 'local',

    /*
    |--------------------------------------------------------------------------
    | Production environment for provider registration
    |--------------------------------------------------------------------------
    */
    'prod_env' => 'production',
];
