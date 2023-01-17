<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Language\Models\LanguageMeta;
use Botble\SimpleSlider\Models\SimpleSlider;
use Botble\SimpleSlider\Models\SimpleSliderItem;
use Illuminate\Support\Arr;
use MetaBox;

class SimpleSliderSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->uploadFiles('sliders');

        SimpleSlider::truncate();
        SimpleSliderItem::truncate();
        LanguageMeta::where('reference_type', SimpleSlider::class)->delete();

        $sliders = [
            'en_US' => [
                [
                    'name' => 'Home slider',
                    'key' => 'home-slider',
                ],
            ],
            'vi' => [
                [
                    'name' => 'Slider trang chủ',
                    'key' => 'slider-trang-chu',
                ],
            ],
        ];

        $sliderItems = [
            'en_US' => [
                [
                    'title' => 'Woman Fashion',
                    'description' => 'Get up to 50% off Today Only!',
                    'button_text' => 'Shop now',
                ],
                [
                    'title' => 'Man Fashion',
                    'description' => '50% off in all products',
                    'button_text' => 'Discover now',
                ],
                [
                    'title' => 'Summer Sale',
                    'description' => 'Taking your Viewing Experience to Next Level',
                    'button_text' => 'Shop now',
                ],
            ],
            'vi' => [
                [
                    'title' => 'Thời trang Nam',
                    'description' => 'Được giảm giá tới 50% Chỉ hôm nay!',
                    'button_text' => 'Mua ngay',
                ],
                [
                    'title' => 'Thời trang Nữ',
                    'description' => 'Khuyến mãi 50% tất cả sản phẩm',
                    'button_text' => 'Khám phá ngay',
                ],
                [
                    'title' => 'Khuyến mãi hè',
                    'description' => 'Nâng trải nghiệm xem của bạn lên cấp độ tiếp theo',
                    'button_text' => 'Mua ngay',
                ],
            ],
        ];

        foreach ($sliders as $locale => $sliderItem) {
            foreach ($sliderItem as $index => $value) {
                $slider = SimpleSlider::create(Arr::only($value, ['name', 'key']));

                $originValue = null;

                if ($locale !== 'en_US') {
                    $originValue = LanguageMeta::where([
                        'reference_id' => $index + 1,
                        'reference_type' => SimpleSlider::class,
                    ])->value('lang_meta_origin');
                }

                LanguageMeta::saveMetaData($slider, $locale, $originValue);

                foreach (collect($sliderItems[$locale]) as $key => $item) {
                    $item['image'] = 'sliders/' . ($key + 1) . '.jpg';
                    $item['order'] = $key + 1;
                    $item['simple_slider_id'] = $slider->id;

                    $sliderItem = SimpleSliderItem::create(Arr::except($item, ['button_text']));

                    MetaBox::saveMetaBoxData($sliderItem, 'button_text', $item['button_text']);
                }
            }
        }
    }
}
