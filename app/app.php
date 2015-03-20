<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";

    $app = new Silex\Application;
    $app['debug'] = true;

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon');

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

// Begin routes

    $app->get('/stylists', function() use ($app){

        return $app['twig']->render('stylists.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->post('/stylists', function() use ($app) {

        $new_stylist = new Stylist($_POST['name']);
        $new_stylist->save();

        return $app['twig']->render('stylists.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->post('/stylists_deleteAll', function() use ($app) {

        Stylist::deleteAll();

        return $app['twig']->render('stylists.html.twig', array('stylists' => Stylist::getAll()));
    });

    // $app->get("/stylists/{id}", function($id) use ($app) {
    //     $current_stylist = Stylist::find($id);
    //     return $app['twig']->render('stylists.html.twig', array('stylist' => $current_stylist, 'restaurants' => Restaurant::getAll()));
    // });
    //

// End routes and return $app





    return $app;

 ?>
