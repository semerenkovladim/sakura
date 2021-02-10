<?php

namespace Sakura\App\Core;

class App
{
    public function run()
    {
        $request = new Request();

        if(! $request->validateCommand()) {
            dump('Invalid data');
            return false;
        }

        $controllerName = $request->getController();
        $method = $request->getMethod();
        
        $controller = new $controllerName;
        $controller->$method();
    }
} 