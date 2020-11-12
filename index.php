<?php

$uri_parse = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

define("PATH_DAO", dirname(__FILE__) . '/DAO/');
define("PATH_VIEW", dirname(__FILE__) . '/Views/');

include 'rotas.php';

