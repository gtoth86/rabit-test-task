<?php declare(strict_types=1);

namespace App\Service;

class Router
{
    public function handle($getVariables)
    {
        if (empty($getVariables)) {
            header('Location: index.php?controller=index&action=index');
            exit;
        }

        $controllerName = $this->resolveControllerName($getVariables);
        $controller = new $controllerName();

        $actionName = $this->resolveActionName($getVariables);

        $controller->{$actionName}();
    }

    private function resolveControllerName($getVariables)
    {
        if (isset($getVariables["controller"])) {
            return sprintf('App\Controller\%sController', ucfirst($getVariables["controller"]));
        }
    }

    private function resolveActionName($getVariables)
    {
        if (isset($getVariables["action"])) {
            return sprintf("%sAction", $getVariables["controller"]);
        }
    }
}
