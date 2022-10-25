<?php

// Phalcon Entrypoint PHP script
// -----------------------------------------------------------------------

declare(strict_types=1);

use Phalcon\Autoload\Loader ;
use Phalcon\Di\FactoryDefault ;
use Phalcon\Mvc\View ;
use Phalcon\Mvc\Url ;
use Phalcon\Mvc\Application ;

//
// ## Autoloader
//
//  We are going to use Phalcon\Autoload\Loader a PSR-4 compliant file
// loader. Common things that should be added to the autoloader are your
// controllers and models. You can also register directries which will
// be scanned for files required by the application.
//
// To start, letss register our app's controllers and models directories
// using Phalcon\Autoload\Loader:
// ```php

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH',  BASE_PATH . '/app');


// autoloader
// https://docs.phalcon.io/5.0/ja-jp/tutorial-basic
// !! use setDirectories
$loader = new Loader() ;
$loader->setDirectories(
    [
        APP_PATH . '/controllers/',     // controllers
        APP_PATH . '/models/',          // models
    ]
);
$loader->register();

//
// ## Factory Default
//
//  The Phalcon\Di\FactoryDefault is a variant of Phalcon\Di\Di. To make
// things easier, it will automatically register most of the components
// that required by an application and come with Phalcon as standard.
// Although it is recommended to set up services manually, you can use
// the Phalcon\Di\FactoryDefault container initially and later on
// customize it to fit your needs.
//
//  Services can be registered in several ways, but for our tutorial,
// we will use an anonymous function:
$container = new FactoryDefault();

//  Now we need to register the view service, setting the directory
// where the framework will find the view files. As the views do not
// correspond to classes, they cannnot be automatically loaded by our
// autoloader.
$container->set(
    'view',
    function () {
        $view = new View();
        $view->setViewsDir(APP_PATH . '/views/');

        return $view;
    }
);

//  Now we need to register a base URI, that will offer the
// functionality to create all URIs by Phalcon. The component will ensure
// that whether you run your application through the top directory, all
// your URIs will be correct. For this tutorial our base path is / .
//  This will become important later on in this tutorial when we use the
// class Phalcon\Tag to generate hyperlinks.
$container->set(
    'url',
    function () {
        $url = new Url();
        $url->setBaseUri('/');

        return $url;
    }
);

//
// ## Handling the Application Request
//
//  In order to handle any requests, the Phalcon\Mvc\Application object
// is used to do all the heavy lifting for us. The component will accept
// the request by the user, detect the routes and dispatch the controller
// and render the view returning the results.
$application = new Application($container);

try {

    // Handle the request
    $response = $application->handle(
        $_SERVER["REQUEST_URI"]
    );

    $response->send();

} catch (\Exceptioin $e) {
    echo 'Exception: ' . $e->getMessage() ;
}










// ```