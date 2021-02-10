<?php

namespace Sakura\App\Core;

class Request
{

    private $controller = 'IndexController';
    private $method = 'index';

    public function __construct()
    {
        $uri = explode('/', $_SERVER['REQUEST_URI']);
        $uri = array_diff($uri, []);

        if(isset($uri[1]))
        {
            $this->controller = ucfirst($uri[1]);
        }

        if(isset($uri[2]))
        {
            $this->method = $uri[2];
        }
    }

    public function getController(): string 
    {
        return "Sakura\App\Controllers\\{$this->controller}Controller";
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function validateCommand(): bool
    {
        if(! class_exists($this->getController()))
        {
            dump("{$this->getController()} does not exist");
            return false;
        }

        if(! method_exists("{$this->getController()}", $this->method))
        {
            dump("{$this->method} does not exist");
            return false;
        }
        
        return true;
    }
}