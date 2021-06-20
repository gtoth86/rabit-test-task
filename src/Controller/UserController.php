<?php declare(strict_types=1);

namespace App\Controller;

class UserController extends AbstractController
{
    public function listAction()
    {
        $this->render('user/list', ["users" => array_values($this->getRepository()->getUsers())]);
    }
}
