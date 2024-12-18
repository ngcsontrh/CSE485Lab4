<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    protected $fillable = [
        'name',
        'birthday',
        'phone',
        'address'
    ];

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
