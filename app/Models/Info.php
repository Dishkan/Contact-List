<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    protected $fillable = ['info_number', 'info_email', 'contact_id'];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
