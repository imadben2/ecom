<?php

namespace Database\Seeders;

use Botble\Ads\Models\Ads;
use Botble\Base\Supports\BaseSeeder;
use Illuminate\Support\Str;

class AdsSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->uploadFiles('promotion');

        Ads::truncate();

        $items = [
            [
                'name' => 'Homepage middle 1',
                'location' => 'not_set',
                'key' => 'IZ6WU8KUALYD',
                'url' => '/product-categories/headphone',
            ],
            [
                'name' => 'Homepage middle 2',
                'location' => 'not_set',
                'key' => 'ILSFJVYFGCPZ',
                'url' => '/product-categories/camera',
            ],
            [
                'name' => 'Homepage middle 3',
                'location' => 'not_set',
                'key' => 'ZDOZUZZIU7FT',
                'url' => '/product-categories/watches',
            ],
        ];

        foreach ($items as $index => $item) {
            $item['order'] = $index + 1;
            if (! isset($item['key'])) {
                $item['key'] = strtoupper(Str::random(12));
            }
            $item['expired_at'] = now()->addYears(5)->toDateString();
            $item['image'] = 'promotion/' . ($index + 1) . '.jpg';

            Ads::create($item);
        }
    }
}
