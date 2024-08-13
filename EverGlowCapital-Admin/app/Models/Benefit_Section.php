<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit_Section extends Model
{
    protected $table = "benefit_section";
    protected $primaryKey = "benefit_id";
    protected $fillable = [
        "benefit_heading",
        "benefit_image",
        "benefit_name",
        "benefit_desc",
    ];
    use HasFactory;
}
