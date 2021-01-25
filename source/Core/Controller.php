<?php

namespace Source\Core;



class Controller
{
    protected $view;

    public function __construct(string $pathToView = null)
    {
        $this->view = new View($pathToView);
    }
}