<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_Us extends Model
{
    use HasFactory;
    protected $table = 'contact_us';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        "firstname",
        "lastname",
        "email",
        "phone",
        "subject",
        "address",
        "message",
    ];
}
