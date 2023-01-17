<?php

namespace Database\Seeders;

use Botble\Base\Models\MetaBox;
use Botble\Base\Supports\BaseSeeder;
use Botble\Language\Models\LanguageMeta;
use Botble\Slug\Models\Slug;
use Botble\Testimonial\Models\Testimonial;
use Botble\Testimonial\Models\TestimonialTranslation;

class TestimonialSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->uploadFiles('testimonials');

        $testimonials = [
            [
                'name' => 'Adam Williams',
                'company' => 'CEO Of Microsoft',
            ],
            [
                'name' => 'Retha Deowalim',
                'company' => 'CEO Of Apple',
            ],
            [
                'name' => 'Sam J. Wasim',
                'company' => 'Pio Founder',
            ],
            [
                'name' => 'Usan Gulwarm',
                'company' => 'CEO Of Facewarm',
            ],
        ];

        Testimonial::truncate();
        TestimonialTranslation::truncate();
        Slug::where('reference_type', Testimonial::class)->delete();
        MetaBox::where('reference_type', Testimonial::class)->delete();
        LanguageMeta::where('reference_type', Testimonial::class)->delete();

        foreach ($testimonials as $index => $item) {
            $item['image'] = 'testimonials/' . ($index + 1) . '.jpg';
            $item['content'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua';

            Testimonial::create($item);
        }

        $translations = [
            [
                'name' => 'Adam Williams',
                'company' => 'Giám đốc Microsoft',
            ],
            [
                'name' => 'Retha Deowalim',
                'company' => 'Giám đốc Apple',
            ],
            [
                'name' => 'Sam J. Wasim',
                'company' => 'Nhà sáng lập Pio',
            ],
            [
                'name' => 'Usan Gulwarm',
                'company' => 'Giám đốc Facewarm',
            ],
        ];

        foreach ($translations as $index => $item) {
            $item['lang_code'] = 'vi';
            $item['testimonials_id'] = $index + 1;

            TestimonialTranslation::insert($item);
        }
    }
}
