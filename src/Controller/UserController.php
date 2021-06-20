<?php declare(strict_types=1);

namespace App\Controller;

class UserController extends AbstractController
{
    /**
     * List of users action
     *
     * @throws \App\Exception\ViewNotFoundException
     */
    public function listAction(): void
    {
        $this->render('user/list', ["users" => array_values($this->getRepository()->getUsers())]);
    }
}
