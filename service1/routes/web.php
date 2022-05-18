<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->post('/imc', 'ImcController@calcularImc');