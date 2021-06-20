<?php declare(strict_types=1);

namespace App\Service;

use App\Model\Advertisement;
use App\Model\User;

class Repository
{
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUsers()
    {
        return $this->pdo->query("SELECT * FROM users")->fetchAll(\PDO::FETCH_CLASS, \App\Model\User::class);
    }

    public function getAdvertisements()
    {
        $result = $this->pdo->query("
          SELECT 
              advertisements.id AS advertisement_id,
              advertisements.title AS advertisement_title,
              advertisements.userid AS user_id,
              users.name AS user_name
          FROM advertisements 
          LEFT JOIN users 
          ON advertisements.userid = users.id
        ")->fetchAll(\PDO::FETCH_ASSOC);


        return array_map(function ($item) {
            $user = new User();
            $user->setId((int) $item["user_id"]);
            $user->setName($item["user_name"]);

            $advertisement = new Advertisement();
            $advertisement->setId((int) $item["advertisement_id"]);
            $advertisement->setTitle($item["advertisement_title"]);
            $advertisement->setUser($user);

            return $advertisement;
        }, $result);
    }
}
