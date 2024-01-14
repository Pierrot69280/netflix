<?php

namespace App\Entity;

use App\Repository\NetflixRepository;
use Core\Attributes\Table;
use Core\Attributes\TargetRepository;

#[Table(name: "netflix")]
#[TargetRepository(name: NetflixRepository::class)]

class Netflix
{
    private int $id;
    private string $name;
    private string $description;
    private int $time;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getTime(): int
    {
        return $this->time;
    }

    public function setTime(int $time): void
    {
        $this->time = $time;
    }


}