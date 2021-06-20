<?php declare(strict_types=1);

namespace App\Controller;

use App\Exception\ViewNotFoundException;
use App\Service\Repository;

abstract class AbstractController
{
    /**
     * Renders a view with a given view path an parameters.
     *
     * @param string $view
     * @param array $parameters
     * @throws ViewNotFoundException
     */
    public function render(string $view, array $parameters = []): void
    {
        $viewFile = __DIR__ . "/../View/" . $view . ".php";

        if (!file_exists($viewFile)) {
            throw new ViewNotFoundException(sprintf("The view: %s not found.", $view));
        }

        extract($parameters);

        require $viewFile;
    }

    /**
     * Get the repository
     *
     * @return Repository
     */
    protected function getRepository(): Repository
    {
        return $GLOBALS['container']->get(\App\Service\Repository::class);
    }
}
