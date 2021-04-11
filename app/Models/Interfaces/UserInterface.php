<?php

namespace App\Models\Interfaces;

interface UserInterface
{
  public function getId(): int;

  public function getFirstName(): string;

  public function setFirstName(string $first_name): void;

  public function getLastName(): string;

  public function setLastName(string $last_name): void;
}
