<?php
session_start();
// session_destroy();

// cart file holde cart logic
include_once('session_opretions/cart.php');
// core.php holds pagination variables
include_once 'config/core.php';  
// include database and object files
include_once 'config/database.php';
include_once 'objects/product.php';
include_once 'objects/category.php';
include_once 'objects/User.php';
include_once 'objects/Order.php';
include_once 'objects/Order_detailes.php';
?>