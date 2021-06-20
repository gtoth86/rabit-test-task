<?php declare(strict_types=1);

namespace App\Controller;

class IndexController extends AbstractController
{
    /**
     * Default page action
     *
     * @throws \App\Exception\ViewNotFoundException
     */
    public function indexAction(): void
    {
        $this->render("index/index");
    }

    /**
     * 404 not found action
     *
     * @throws \App\Exception\ViewNotFoundException
     */
    public function notFoundAction(): void
    {
        $this->render("index/404");
    }
}
