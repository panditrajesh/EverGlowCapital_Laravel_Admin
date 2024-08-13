<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription_Section extends Model
{
    use HasFactory;
    protected $table = 'subscription_section';
    protected $primaryKey = 'subscription_id';
    protected $fillable = [
        'subscription_heading',
        'subscription_para',
    ];
}
