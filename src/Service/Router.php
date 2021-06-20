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

        $controller = $this->getControllerInstance($getVariables);
        $actionName = $this->resolveActionName($getVariables);

        $this->callAction($controller, $actionName);
    }

    private function getControllerInstance($getVariables)
    {
        if (!isset($getVariables["controller"])) {
            $this->redirectToNotFoundPage();
        }

        $controllerName = sprintf('App\Controller\%sController', ucfirst($getVariables["controller"]));

        if (!class_exists($controllerName)) {
            $this->redirectToNotFoundPage();
        }

        return new $controllerName();
    }

    private function resolveActionName($getVariables)
    {
        if (!isset($getVariables["action"])) {
            $this->redirectToNotFoundPage();
        }

        return sprintf("%sAction", $getVariables["action"]);
    }

    private function callAction($controller, $actionName)
    {
        if (!method_exists($controller,$actionName)) {
            $this->redirectToNotFoundPage();
        }

        $controller->{$actionName}();
    }

    private function redirectToNotFoundPage()
    {
        header('Location: index.php?controller=index&action=notFound');
        exit;
    }
}
