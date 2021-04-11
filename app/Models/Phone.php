<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Interfaces\PhoneInterface;

class Phone extends Model implements PhoneInterface
{
    public $timestamps = false;

    public $fillable = [
      'phone'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }
}
