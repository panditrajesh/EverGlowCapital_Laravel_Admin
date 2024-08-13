<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Add_Page extends Model
{
    protected $table = 'add__pages';
    protected $primaryKey = 'page_id';
    protected $fillable = [
        'page_name',
        'featured_image',
        'banner_image',
        'page_shortdesc',
        'page_desc'
    ];
    use HasFactory;
}
