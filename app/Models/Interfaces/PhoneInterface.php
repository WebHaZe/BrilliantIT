<?php

namespace App\Models\Interfaces;

interface PhoneInterface
{
  public function getId(): int;

  public function getPhone(): string;

  public function setPhone(string $phone): void;
}
