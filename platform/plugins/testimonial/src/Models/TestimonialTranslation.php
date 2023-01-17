<?php

namespace Botble\Testimonial\Models;

use Botble\Base\Models\BaseModel;

class TestimonialTranslation extends BaseModel
{
    protected $table = 'testimonials_translations';

    protected $fillable = [
        'lang_code',
        'testimonials_id',
        'name',
        'content',
        'company',
    ];

    public $timestamps = false;
}
