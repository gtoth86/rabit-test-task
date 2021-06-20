<?php declare(strict_types=1);

namespace App\Controller;

class IndexController extends AbstractController
{
    public function indexAction()
    {
        $this->render("index/index");
    }

    public function notFoundAction()
    {
        $this->render("index/404");
    }
}
