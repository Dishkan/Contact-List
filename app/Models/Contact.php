<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'number', 'second_number', 'email', 'second_email'];

    public function info() {
        return $this->hasMany(Info::class, 'contact_id', 'id');
    }
}
