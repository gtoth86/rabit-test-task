<?php declare(strict_types=1);

namespace App\Controller;

class AdvertisementController extends AbstractController
{
    /**
     * List of advertisements action
     *
     * @throws \App\Exception\ViewNotFoundException
     */
    public function listAction(): void
    {
        $this->render('advertisement/list', ["advertisements" => array_values($this->getRepository()->getAdvertisements())]);
    }
}
