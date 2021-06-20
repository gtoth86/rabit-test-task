<?php declare(strict_types=1);

namespace App\Controller;

class AdvertisementController extends AbstractController
{
    public function listAction()
    {
        $this->render('advertisement/list', ["advertisements" => array_values($this->getRepository()->getAdvertisements())]);
    }
}
