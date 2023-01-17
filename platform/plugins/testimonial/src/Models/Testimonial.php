<?php

namespace Botble\Testimonial\Models;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use Botble\Base\Traits\EnumCastable;

class Testimonial extends BaseModel
{
    use EnumCastable;

    protected $table = 'testimonials';

    protected $fillable = [
        'name',
        'company',
        'content',
        'image',
        'status',
    ];

    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];
}
