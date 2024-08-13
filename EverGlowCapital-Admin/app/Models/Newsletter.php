<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{

    use HasFactory;
    protected $table = "newsletters";
    protected $primaryKey = "newsletter_id";
    protected $fillable = [
        "newsletter_image",
        "newsletter_price",
        "newsletter_heading",
        "newsletter_title",
        "newsletter_shortdesc",
    ];
}
