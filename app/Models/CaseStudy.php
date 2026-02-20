<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CaseStudy extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug',
        'title',
        'post_image',
        'outer_text',
        'inner_text',
        'pdf_file',
        'high_lights',
        'status',
    ];

    protected $casts = [
        'high_lights' => 'array',
        'status' => 'boolean',
    ];
}