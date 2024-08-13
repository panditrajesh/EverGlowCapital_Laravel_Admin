<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Registration extends Model
{
    use HasFactory;
    protected $table = 'user_registration';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        "firstname",
        "lastname",
        "email",
        "phone",
        "username",
        "password",
        "confirmpassword"
    ];
}
