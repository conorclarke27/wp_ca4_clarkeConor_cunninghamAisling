<?php

  // Include the Rapid library
  require_once('lib/Rapid.php');

  // Create a new Router instance
  $app = new \Rapid\Router();

  // Define some routes. Here: requests to / will be
  // processed by the controller at controllers/Home.php
  $app->GET('/',                  'Home');
  $app->GET('/view-coffees',      'ViewCoffees');
  $app->GET('/view-orders',       'ViewOrders');
  $app->GET('/view-users',        'ViewUsers');
  $app->GET('/add-coffees',       'AddCoffeesGet');
  $app->POST('/add-coffees',      'AddCoffeesPost');
  $app->GET('/add-orders',        'AddOrdersGet');
  $app->POST('/add-orders',       'AddOrdersPost');
  $app->GET('/add-user-login',    'AddUserGet');
  $app->POST('/add-user-login',   'AddUserPost');
  $app->GET('/add-userTypes',     'AddUserTypesGet');
  $app->POST('/add-userTypes',    'AddUserTypesPost');
  $app->GET('/edit-coffees',      'EditCoffeesGet');
  $app->POST('/edit-coffees',     'EditCoffeesPost');
  $app->GET('/edit-orders',       'EditOrdersGet');
  $app->POST('/edit-orders',       'EditOrdersPost');

  // Process the request
  $app->dispatch();

?>