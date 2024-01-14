<?php

namespace App\Repository;

use App\Entity\Netflix;
use Core\Attributes\TargetEntity;
use Core\Repository\Repository;


#[TargetEntity(name: Netflix::class)]
class NetflixRepository extends Repository
{
    public function save(Netflix $netflix)
    {
        $query = $this->pdo->prepare("INSERT INTO $this->tableName SET name = :name, description = :description, time = :time");

        $query->execute([
            "name"=>$netflix->getName(),
            "description"=>$netflix->getDescription(),
            "time"=>$netflix->getTime()
        ]);


    }


    public function edit(Netflix $netflix){

        $query = $this->pdo->prepare("UPDATE $this->tableName SET name = :name, description = :description, time = :time WHERE id = :id");

        $query->execute(
            [
                "id"=>$netflix->getId(),
                "name"=>$netflix->getName(),
                "description"=>$netflix->getDescription(),
                "time"=>$netflix->getTime(),
            ]
        );
    }
}
