<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial_Section extends Model
{
    protected $table = 'testimonial_section';
    protected $primaryKey = 'testimonial_id';
    protected $fillable = [
        'testimonial_section_heading',
        'testimonial_image',
        'testimonial_heading',
        'testimonial_shortdesc',
        'testimonial_author',
        'testimonial_author_position'
    ];
    use HasFactory;
}
