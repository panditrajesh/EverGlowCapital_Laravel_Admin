<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq_Section extends Model
{
    use HasFactory;
    protected $table = 'faq_section';
    protected $primaryKey = 'faq_id';
    protected $fillable = [
        "question",
        "answer",
    ];
}
