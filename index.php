<?php
 

  // Include the Rapid library
  require_once('lib/Rapid.php');

  //used for local host
  define ('SITE_BASE_DIR','/wp_ca4_clarkeConor_cunninghamAisling');

  //used for remote host
  //define ('SITE_BASE_DIR','');

  // Create a new Router instance
  $app = new \Rapid\Router();

  try{
  // Define some routes. Here: requests to / will be
  // processed by the controller at controllers/Home.php
  $app->GET('/',                  'Home');
  $app->GET('/view-coffees',      'ViewCoffees');
  $app->GET('/view-orders',       'ViewOrders');
  $app->GET('/view-users',        'ViewUsers');
  $app->GET('/view-userTypes',    'ViewUserTypes');
  $app->GET('/add-coffees',       'AddCoffeesGet');
  $app->POST('/add-coffees',      'AddCoffeesPost');
  $app->GET('/add-orders',        'AddOrdersGet');
  $app->POST('/add-orders',       'AddOrdersPost');
  $app->GET('/add-user',          'AddUserGet');
  $app->POST('/add-user',         'AddUserPost');
  $app->GET('/add-userTypes',     'AddUserTypesGet');
  $app->POST('/add-userTypes',    'AddUserTypesPost');
  $app->GET('/edit-coffees',      'EditCoffeesGet');
  $app->POST('/edit-coffees',     'EditCoffeesPost');
  $app->GET('/edit-orders',       'EditOrdersGet');
  $app->POST('/edit-orders',      'EditOrdersPost');
  $app->GET('/edit-users',        'EditUserGet');
  $app->POST('/edit-users',       'EditUserPost');
  $app->GET('/edit-userTypes',    'EditUserTypeGet');
  $app->POST('/edit-userTypes',   'EditUserTypePost');
  $app->GET('/DeleteCoffee',      'DeleteCoffee');
  $app->GET('/DeleteOrder',       'DeleteOrder');
  $app->GET('/DeleteUser',        'DeleteUser');
  $app->GET('/DeleteUserType',    'DeleteUserType');

  $app->GET('/api/Users',      'api/Users');
  $app->POST('/api/Users',      'api/Users');
  $app->GET('/api/ShoppingCart',      'api/ShoppingCart');
  $app->POST('/api/ShoppingCart',      'api/ShoppingCart');

  $app->GET('/user-login',        'LogInGet');
  $app->POST('/user-login',       'LogInPost');

  $app->GET('/admin-login',        'AdminLogInGet');
  $app->GET('/admin-menu',        'AdminMenu');
  $app->POST('/admin-login',       'AdminLogInPost');
  
  $app->GET('/logout',        'Logout');
  
  // Process the request
  $app->dispatch();
  }
  catch(\Rapid\RouteNotFoundException $e){
    $res =  $e->getResponseObject();
    $res->render('main', '404', []);
 
 }

?>