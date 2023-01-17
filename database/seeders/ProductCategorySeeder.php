<?php

namespace Database\Seeders;

use Botble\Base\Models\MetaBox as MetaBoxModel;
use Botble\Base\Supports\BaseSeeder;
use Botble\Ecommerce\Models\ProductCategory;
use Botble\Slug\Models\Slug;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use MetaBox;
use SlugHelper;

class ProductCategorySeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->uploadFiles('product-categories');

        $categories = [
            [
                'name' => 'Television',
                'icon' => 'flaticon-tv',
                'image' => 'product-categories/p-1.png',
                'is_featured' => true,
                'children' => [
                    [
                        'name' => 'Home Audio & Theaters',
                    ],
                    [
                        'name' => 'TV & Videos',
                    ],
                    [
                        'name' => 'Camera, Photos & Videos',
                    ],
                    [
                        'name' => 'Cellphones & Accessories',
                    ],
                    [
                        'name' => 'Headphones',
                    ],
                    [
                        'name' => 'Videos games',
                    ],
                    [
                        'name' => 'Wireless Speakers',
                    ],
                    [
                        'name' => 'Office Electronic',
                    ],
                ],
            ],
            [
                'name' => 'Mobile',
                'icon' => 'flaticon-responsive',
                'image' => 'product-categories/p-2.png',
                'is_featured' => true,
                'children' => [
                    [
                        'name' => 'Digital Cables',
                    ],
                    [
                        'name' => 'Audio & Video Cables',
                    ],
                    [
                        'name' => 'Batteries',
                    ],
                ],
            ],
            [
                'name' => 'Headphone',
                'icon' => 'flaticon-headphones',
                'image' => 'product-categories/p-3.png',
                'is_featured' => true,
                'children' => [
                    [
                        'name' => 'Computer & Tablets',
                    ],
                    [
                        'name' => 'Laptop',
                    ],
                    [
                        'name' => 'Monitors',
                    ],
                    [
                        'name' => 'Computer Components',
                    ],
                ],
            ],
            [
                'name' => 'Watches',
                'icon' => 'flaticon-watch',
                'image' => 'product-categories/p-4.png',
                'is_featured' => true,
                'children' => [
                    [
                        'name' => 'Drive & Storages',
                    ],
                    [
                        'name' => 'Gaming Laptop',
                    ],
                    [
                        'name' => 'Security & Protection',
                    ],
                    [
                        'name' => 'Accessories',
                    ],
                ],
            ],
            [
                'name' => 'Game',
                'icon' => 'flaticon-console',
                'image' => 'product-categories/p-5.png',
                'is_featured' => true,
            ],
            [
                'name' => 'Camera',
                'icon' => 'flaticon-camera',
                'image' => 'product-categories/p-6.png',
                'is_featured' => true,
            ],
            [
                'name' => 'Audio',
                'icon' => 'flaticon-music-system',
                'image' => 'product-categories/p-7.png',
                'is_featured' => true,
            ],
            [
                'name' => 'Mobile & Tablet',
                'icon' => 'flaticon-responsive',
            ],
            [
                'name' => 'Accessories',
                'icon' => 'flaticon-plugins',
            ],
            [
                'name' => 'Home Audio & Theater',
                'icon' => 'flaticon-music-system',
            ],
            [
                'name' => 'Tv & Smart Box',
                'icon' => 'flaticon-monitor',
            ],
            [
                'name' => 'Printer',
                'icon' => 'flaticon-printer',
            ],
            [
                'name' => 'Computer',
                'icon' => 'flaticon-tv',
            ],
            [
                'name' => 'Fax Machine',
                'icon' => 'flaticon-fax',
            ],
            [
                'name' => 'Mouse',
                'icon' => 'flaticon-mouse',
            ],
        ];

        ProductCategory::truncate();
        Slug::where('reference_type', ProductCategory::class)->delete();
        MetaBoxModel::where('reference_type', ProductCategory::class)->delete();

        foreach ($categories as $index => $item) {
            $this->createCategoryItem($index, $item);
        }

        // Translations
        DB::table('ec_product_categories_translations')->truncate();

        $translations = [
            [
                'name' => 'Tivi',
                'children' => [
                    [
                        'name' => 'Home Audio & Theaters',
                    ],
                    [
                        'name' => 'TV & Videos',
                    ],
                    [
                        'name' => 'Camera, Photos & Videos',
                    ],
                    [
                        'name' => 'Cellphones & Accessories',
                    ],
                    [
                        'name' => 'Headphones',
                    ],
                    [
                        'name' => 'Videos games',
                    ],
                    [
                        'name' => 'Wireless Speakers',
                    ],
                    [
                        'name' => 'Office Electronic',
                    ],
                ],
            ],
            [
                'name' => 'Di động',
                'children' => [
                    [
                        'name' => 'Digital Cables',
                    ],
                    [
                        'name' => 'Audio & Video Cables',
                    ],
                    [
                        'name' => 'Batteries',
                    ],
                ],
            ],
            [
                'name' => 'Tai nghe',
                'children' => [
                    [
                        'name' => 'Computer & Tablets',
                    ],
                    [
                        'name' => 'Laptop',
                    ],
                    [
                        'name' => 'Monitors',
                    ],
                    [
                        'name' => 'Computer Components',
                    ],
                ],
            ],
            [
                'name' => 'Đồng hồ',
                'children' => [
                    [
                        'name' => 'Drive & Storages',
                    ],
                    [
                        'name' => 'Gaming Laptop',
                    ],
                    [
                        'name' => 'Security & Protection',
                    ],
                    [
                        'name' => 'Accessories',
                    ],
                ],
            ],
            [
                'name' => 'Trò chơi',
            ],
            [
                'name' => 'Máy ảnh',
            ],
            [
                'name' => 'Âm thanh',
            ],
            [
                'name' => 'Di động & Máy tính bảng',
            ],
            [
                'name' => 'Phụ kiện',
            ],
            [
                'name' => 'Âm thanh & hình ảnh',
            ],
            [
                'name' => 'Tv & Smart Box',
            ],
            [
                'name' => 'Máy in',
            ],
            [
                'name' => 'Máy tính',
            ],
            [
                'name' => 'Máy Fax',
            ],
            [
                'name' => 'Chuột máy tính',
            ],
        ];

        $count = 1;
        foreach ($translations as $translation) {
            $translation['lang_code'] = 'vi';
            $translation['ec_product_categories_id'] = $count;

            DB::table('ec_product_categories_translations')->insert(Arr::except($translation, ['children']));

            $count++;

            if (isset($translation['children'])) {
                foreach ($translation['children'] as $child) {
                    $child['lang_code'] = 'vi';
                    $child['ec_product_categories_id'] = $count;

                    DB::table('ec_product_categories_translations')->insert($child);

                    $count++;
                }
            }
        }
    }

    /**
     * @param int $index
     * @param array $category
     * @param int $parentId
     */
    protected function createCategoryItem(int $index, array $category, int $parentId = 0): void
    {
        $category['parent_id'] = $parentId;
        $category['order'] = $index;

        if (Arr::has($category, 'children')) {
            $children = $category['children'];
            unset($category['children']);
        } else {
            $children = [];
        }

        $createdCategory = ProductCategory::create(Arr::except($category, ['icon']));

        Slug::create([
            'reference_type' => ProductCategory::class,
            'reference_id' => $createdCategory->id,
            'key' => Str::slug($createdCategory->name),
            'prefix' => SlugHelper::getPrefix(ProductCategory::class),
        ]);

        if (isset($category['icon'])) {
            MetaBox::saveMetaBoxData($createdCategory, 'icon', $category['icon']);
        }

        if ($children) {
            foreach ($children as $childIndex => $child) {
                $this->createCategoryItem($childIndex, $child, $createdCategory->id);
            }
        }
    }
}
