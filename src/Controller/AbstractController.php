<?php declare(strict_types=1);

namespace App\Controller;

use App\Service\Repository;

abstract class AbstractController
{
    public function render($view, $parameters = [])
    {
        extract($parameters);

        require __DIR__ . "/../View/" . $view . ".php";
    }

    protected function getRepository(): Repository
    {
        return $GLOBALS['container']->get(\App\Service\Repository::class);
    }
}
