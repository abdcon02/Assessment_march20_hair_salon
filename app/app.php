<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";
    require_once __DIR__."/../src/Client.php";

    $app = new Silex\Application;
    $app['debug'] = true;

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon');

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

// Begin routes

    $app->get('/', function() use ($app){

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

    $app->get("/stylists/{id}", function($id) use ($app) {
        $current_stylist = Stylist::find($id);
        return $app['twig']->render('stylist_page.html.twig', array('stylist' => $current_stylist, 'clients' => $current_stylist->findClients()));
    });

    $app->post("/clients_deleteAll", function() use($app){
        $stylist_id = $_POST['stylist_id'];
        $current_stylist = Stylist::find($stylist_id);
        $clients = $current_stylist->findClients();
        foreach($clients as $person){
            $person->delete();
        }
        return $app['twig']->render('stylist_page.html.twig', array('stylist' => $current_stylist, 'clients' => $current_stylist->findClients()));
    });

    $app->post("client_add", function() use ($app){

        $stylist_id = $_POST['stylist_id'];
        $new_client = new Client($_POST['name'], $id = null, $stylist_id);
        $new_client->save();
        $current_stylist = Stylist::find($stylist_id);
        return $app['twig']->render('stylist_page.html.twig', array('stylist' => $current_stylist, 'clients' => $current_stylist->findClients()));
    });


// End routes and return $app





    return $app;

 ?>
