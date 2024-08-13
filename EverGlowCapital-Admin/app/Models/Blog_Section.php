<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_Section extends Model
{
    protected $table = "blog_section";
    protected $primaryKey = "blog_id";
    protected $fillable = [
        "blog_para",
        "blog_section_heading",
        "blog_image",
        "blog_category",
        "blog_heading",
        "blog_shortdesc",
    ];

    use HasFactory;
}
