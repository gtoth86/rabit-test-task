<?php declare(strict_types=1);

namespace App\Service;

use App\Controller\AbstractController;

class Router
{
    /**
     * Call the appropriate controller action
     *
     * @param array $getVariables
     */
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

    /**
     * Get the right controller instance if it exist, otherwise redirect to not found page
     *
     * @param array $getVariables
     * @return AbstractController
     */
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

    /**
     * Get the right action name
     *
     * @param array $getVariables
     * @return string
     */
    private function resolveActionName(array $getVariables): string
    {
        if (!isset($getVariables["action"])) {
            $this->redirectToNotFoundPage();
        }

        return sprintf("%sAction", $getVariables["action"]);
    }

    /**
     * Call the action on controller if exist, otherwise redirect to not found page
     *
     * @param AbstractController $controller
     * @param string $actionName
     */
    private function callAction(AbstractController $controller, string $actionName)
    {
        if (!method_exists($controller,$actionName)) {
            $this->redirectToNotFoundPage();
        }

        $controller->{$actionName}();
    }

    /**
     * Redirect to not found page
     */
    private function redirectToNotFoundPage(): void
    {
        header('Location: index.php?controller=index&action=notFound');
        exit;
    }
}
