<?php
ob_start();

require __DIR__ . "/vendor/autoload.php";


use CoffeeCode\Router\Router;
$route = new Router(url(), ":");
/**
 * Route home 
 */
$route->namespace("Source\App");
$route->get("/" , "Web:home");
$route->get("/p/{pager}", "Web:home");
/**
 * Route generic
 */
$route->get("/generic", "Web:generic");
$route->get("/generic/{page}", "Web:genericpost");
/**
 * Route terms
 */
$route->get("/terms", "Web:terms");

/**
 * Admin
 */
$route->group("/admin");
$route->get("/" , "Web:admin");
$route->post("/" , "Web:admin");
$route->get("/painel" , "Web:painel");
$route->post("/painel" , "Web:painel");
$route->get("/painel/p/{pager}", "Web:painel");
$route->get("/painel/adicionar" , "Web:adicionar");
$route->post("/painel/adicionar" , "Web:adicionar");
$route->get("/painel/editar/{page}" , "Web:editar");
$route->post("/painel/editar/{page}" , "Web:editar");

/**
 * erro router
 */
$route->namespace("Source\App")->group("/ops");
$route->get("/{errcode}", "Web:error");

/**
 * 
 * Router
 */
$route->dispatch();

/**
 * test erro
 */
if($route->error())
{
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();