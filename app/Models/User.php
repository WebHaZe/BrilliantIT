<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Phone;
use App\Models\Interfaces\UserInterface;

class User extends Model implements UserInterface
{
    public $timestamps = false;

    public function phones()
    {
      return $this->hasMany(Phone::class);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): void
    {
        $this->first_name = $first_name;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): void
    {
        $this->last_name = $last_name;
    }

    public function getPhonesInColumn(): string
    {
        $phonesCollect = $this->phones;
        $phonesInColumn = '';
        foreach ($phonesCollect as $phoneModel) {
          $phonesInColumn .= $phoneModel->getPhone() . "\n";
        }

        return $phonesInColumn;
    }
}
