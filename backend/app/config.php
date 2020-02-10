<?php

// default route
$routes['get']['']                  = 'Welcome';

// project routes
// product 
$routes['get']['product']           = 'Product/list';
$routes['get']['product/:id']       = 'Product/get';
$routes['post']['product']          = 'Product/create';
$routes['post']['product/search']   = 'Product/search';
$routes['put']['product/:id']       = 'Product/set';
$routes['delete']['product/:id']    = 'Product/delete';
// category
$routes['get']['category']          = 'Category/list';
$routes['get']['category/:id']      = 'Category/get';
$routes['post']['category']         = 'Category/create';
$routes['post']['category/search']  = 'Category/search';
$routes['put']['category/:id']      = 'Category/set';
$routes['delete']['category/:id']   = 'Category/delete';
