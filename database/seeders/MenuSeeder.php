<?php

namespace Database\Seeders;

use Botble\Base\Supports\BaseSeeder;
use Botble\Blog\Models\Category;
use Botble\Blog\Models\Tag;
use Botble\Ecommerce\Models\Brand;
use Botble\Ecommerce\Models\ProductCategory;
use Botble\Ecommerce\Models\ProductTag;
use Botble\Language\Models\LanguageMeta;
use Botble\Menu\Models\Menu as MenuModel;
use Botble\Menu\Models\MenuLocation;
use Botble\Menu\Models\MenuNode;
use Botble\Page\Models\Page;
use Illuminate\Support\Arr;
use Menu;

class MenuSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'en_US' => [
                [
                    'name' => 'Main menu',
                    'slug' => 'main-menu',
                    'location' => 'main-menu',
                    'items' => [
                        [
                            'title' => 'Home',
                            'url' => '/',
                        ],
                        [
                            'title' => 'Products',
                            'url' => '/products',
                        ],
                        [
                            'title' => 'Shop',
                            'url' => '#',
                            'children' => [
                                [
                                    'title' => 'Product Category',
                                    'reference_id' => 1,
                                    'reference_type' => ProductCategory::class,
                                ],
                                [
                                    'title' => 'Brand',
                                    'reference_id' => 1,
                                    'reference_type' => Brand::class,
                                ],
                                [
                                    'title' => 'Product Tag',
                                    'reference_id' => 1,
                                    'reference_type' => ProductTag::class,
                                ],
                                [
                                    'title' => 'Product Single',
                                    'url' => 'products/beat-headphone',
                                ],
                            ],
                        ],
                        [
                            'title' => 'Blog',
                            'reference_id' => 3,
                            'reference_type' => Page::class,
                            'children' => [
                                [
                                    'title' => 'Blog Left Sidebar',
                                    'reference_id' => 3,
                                    'reference_type' => Page::class,
                                ],
                                [
                                    'title' => 'Blog Category',
                                    'reference_id' => 1,
                                    'reference_type' => Category::class,
                                ],
                                [
                                    'title' => 'Blog Tag',
                                    'reference_id' => 1,
                                    'reference_type' => Tag::class,
                                ],
                                [
                                    'title' => 'Blog Single',
                                    'url' => 'news/4-expert-tips-on-how-to-choose-the-right-mens-wallet',
                                ],
                            ],
                        ],
                        [
                            'title' => 'FAQ',
                            'reference_id' => 5,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title' => 'Contact',
                            'reference_id' => 2,
                            'reference_type' => Page::class,
                        ],
                    ],
                ],
                [
                    'name' => 'Useful Links',
                    'slug' => 'useful-links',
                    'items' => [
                        [
                            'title' => 'About Us',
                            'reference_id' => 4,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title' => 'FAQ',
                            'reference_id' => 5,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title' => 'Location',
                            'reference_id' => 6,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title' => 'Affiliates',
                            'reference_id' => 7,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title' => 'Contact',
                            'reference_id' => 2,
                            'reference_type' => Page::class,
                        ],
                    ],
                ],
                [
                    'name' => 'Categories',
                    'slug' => 'categories',
                    'items' => [
                        [
                            'title' => 'Television',
                            'reference_id' => 1,
                            'reference_type' => ProductCategory::class,
                        ],
                        [
                            'title' => 'Mobile',
                            'reference_id' => 2,
                            'reference_type' => ProductCategory::class,
                        ],
                        [
                            'title' => 'Headphone',
                            'reference_id' => 3,
                            'reference_type' => ProductCategory::class,
                        ],
                        [
                            'title' => 'Watches',
                            'reference_id' => 4,
                            'reference_type' => ProductCategory::class,
                        ],
                        [
                            'title' => 'Game',
                            'reference_id' => 5,
                            'reference_type' => ProductCategory::class,
                        ],
                    ],
                ],
                [
                    'name' => 'My Account',
                    'slug' => 'my-account',
                    'items' => [
                        [
                            'title' => 'My profile',
                            'url' => '/customer/overview',
                        ],
                        [
                            'title' => 'Wishlist',
                            'url' => '/wishlist',
                        ],
                        [
                            'title' => 'Orders',
                            'url' => 'customer/orders',
                        ],
                        [
                            'title' => 'Order tracking',
                            'url' => '/orders/tracking',
                        ],
                    ],
                ],
            ],
            'vi' => [
                [
                    'name' => 'Menu chính',
                    'slug' => 'menu-chinh',
                    'location' => 'main-menu',
                    'items' => [
                        [
                            'title' => 'Trang chủ',
                            'url' => '/',
                        ],
                        [
                            'title' => 'Sản phẩm',
                            'url' => '/products',
                        ],
                        [
                            'title' => 'Cửa hàng',
                            'url' => '#',
                            'children' => [
                                [
                                    'title' => 'Danh mục sản phẩm',
                                    'reference_id' => 1,
                                    'reference_type' => ProductCategory::class,
                                ],
                                [
                                    'title' => 'Thương hiệu',
                                    'reference_id' => 1,
                                    'reference_type' => Brand::class,
                                ],
                                [
                                    'title' => 'Tag sản phẩm',
                                    'reference_id' => 1,
                                    'reference_type' => ProductTag::class,
                                ],
                                [
                                    'title' => 'Sản phẩm chi tiết',
                                    'url' => 'products/beat-headphone',
                                ],
                            ],
                        ],
                        [
                            'title' => 'Tin tức',
                            'reference_id' => 3,
                            'reference_type' => Page::class,
                            'children' => [
                                [
                                    'title' => 'Blog Left Sidebar',
                                    'reference_id' => 3,
                                    'reference_type' => Page::class,
                                ],
                                [
                                    'title' => 'Danh mục',
                                    'reference_id' => 5,
                                    'reference_type' => Category::class,
                                ],
                                [
                                    'title' => 'Tag bài viết',
                                    'reference_id' => 6,
                                    'reference_type' => Tag::class,
                                ],
                                [
                                    'title' => 'Bài viết chi tiết',
                                    'url' => 'news/vi/4-expert-tips-on-how-to-choose-the-right-mens-wallet',
                                ],
                            ],
                        ],
                        [
                            'title' => 'FAQ',
                            'reference_id' => 5,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title' => 'Liên hệ',
                            'reference_id' => 2,
                            'reference_type' => Page::class,
                        ],
                    ],
                ],
                [
                    'name' => 'Liên kết hữu ích',
                    'slug' => 'lien-ket-huu-ich',
                    'items' => [
                        [
                            'title' => 'Về chúng tôi',
                            'reference_id' => 4,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title' => 'Hỏi đáp',
                            'reference_id' => 5,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title' => 'Vị trí',
                            'reference_id' => 6,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title' => 'Chi nhánh',
                            'reference_id' => 7,
                            'reference_type' => Page::class,
                        ],
                        [
                            'title' => 'Liên hệ',
                            'reference_id' => 2,
                            'reference_type' => Page::class,
                        ],
                    ],
                ],
                [
                    'name' => 'Danh mục',
                    'slug' => 'danh-muc',
                    'items' => [
                        [
                            'title' => 'Tivi',
                            'reference_id' => 1,
                            'reference_type' => ProductCategory::class,
                        ],
                        [
                            'title' => 'Di động',
                            'reference_id' => 2,
                            'reference_type' => ProductCategory::class,
                        ],
                        [
                            'title' => 'Tai nghe',
                            'reference_id' => 3,
                            'reference_type' => ProductCategory::class,
                        ],
                        [
                            'title' => 'Đồng hồ',
                            'reference_id' => 4,
                            'reference_type' => ProductCategory::class,
                        ],
                        [
                            'title' => 'Trò chơi',
                            'reference_id' => 5,
                            'reference_type' => ProductCategory::class,
                        ],
                    ],
                ],
                [
                    'name' => 'Tài khoản',
                    'slug' => 'tai-khoan',
                    'items' => [
                        [
                            'title' => 'Tài khoản của tôi',
                            'url' => '/customer/overview',
                        ],
                        [
                            'title' => 'Danh sách yêu thích',
                            'url' => '/wishlist',
                        ],
                        [
                            'title' => 'Đơn hàng',
                            'url' => 'customer/orders',
                        ],
                        [
                            'title' => 'Theo dõi đơn hàng',
                            'url' => '/orders/tracking',
                        ],
                    ],
                ],
            ],
        ];

        MenuModel::truncate();
        MenuLocation::truncate();
        MenuNode::truncate();
        LanguageMeta::where('reference_type', MenuModel::class)->delete();
        LanguageMeta::where('reference_type', MenuLocation::class)->delete();

        foreach ($data as $locale => $menus) {
            foreach ($menus as $index => $item) {
                $menu = MenuModel::create(Arr::except($item, ['items', 'location']));

                if (isset($item['location'])) {
                    $menuLocation = MenuLocation::create([
                        'menu_id' => $menu->id,
                        'location' => $item['location'],
                    ]);

                    $originValue = LanguageMeta::where([
                        'reference_id' => $locale == 'en_US' ? $menu->id : $menu->id + 3,
                        'reference_type' => MenuLocation::class,
                    ])->value('lang_meta_origin');

                    LanguageMeta::saveMetaData($menuLocation, $locale, $originValue);
                }

                foreach ($item['items'] as $menuNode) {
                    $this->createMenuNode($index, $menuNode, $locale, $menu->id);
                }

                $originValue = null;

                if ($locale !== 'en_US') {
                    $originValue = LanguageMeta::where([
                        'reference_id' => $index + 1,
                        'reference_type' => MenuModel::class,
                    ])->value('lang_meta_origin');
                }

                LanguageMeta::saveMetaData($menu, $locale, $originValue);
            }
        }

        Menu::clearCacheMenuItems();
    }

    /**
     * @param int $index
     * @param array $menuNode
     * @param string $locale
     * @param int $menuId
     * @param int $parentId
     */
    protected function createMenuNode(int $index, array $menuNode, string $locale, int $menuId, int $parentId = 0): void
    {
        $menuNode['menu_id'] = $menuId;
        $menuNode['parent_id'] = $parentId;

        if (isset($menuNode['url'])) {
            $menuNode['url'] = str_replace(url(''), '', $menuNode['url']);
        }

        if (Arr::has($menuNode, 'children')) {
            $children = $menuNode['children'];
            $menuNode['has_child'] = true;

            unset($menuNode['children']);
        } else {
            $children = [];
            $menuNode['has_child'] = false;
        }

        $createdNode = MenuNode::create($menuNode);

        if ($children) {
            foreach ($children as $child) {
                $this->createMenuNode($index, $child, $locale, $menuId, $createdNode->id);
            }
        }
    }
}
