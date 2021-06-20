<?php declare(strict_types=1);

namespace App\Service;

use App\Controller\AbstractController;

class Router
{
    public function handle(array $getVariables): void
    {
        if (empty($getVariables)) {
            header('Location: index.php?controller=index&action=index');
            exit;
        }

        $controller = $this->getControllerInstance($getVariables);
        $actionName = $this->resolveActionName($getVariables);

        $this->callAction($controller, $actionName);
    }

    private function getControllerInstance(array $getVariables): AbstractController
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

    private function resolveActionName(array $getVariables): string
    {
        if (!isset($getVariables["action"])) {
            $this->redirectToNotFoundPage();
        }

        return sprintf("%sAction", $getVariables["action"]);
    }

    private function callAction(AbstractController $controller, string $actionName)
    {
        if (!method_exists($controller,$actionName)) {
            $this->redirectToNotFoundPage();
        }

        $controller->{$actionName}();
    }

    private function redirectToNotFoundPage(): void
    {
        header('Location: index.php?controller=index&action=notFound');
        exit;
    }
}
