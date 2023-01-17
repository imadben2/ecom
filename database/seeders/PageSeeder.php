<?php

namespace Database\Seeders;

use Botble\Base\Models\MetaBox as MetaBoxModel;
use Botble\Base\Supports\BaseSeeder;
use Botble\Language\Models\LanguageMeta;
use Botble\LanguageAdvanced\Models\PageTranslation;
use Botble\Page\Models\Page;
use Botble\Slug\Models\Slug;
use Faker\Factory;
use Html;
use Illuminate\Support\Str;
use SlugHelper;

class PageSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $pages = [
            [
                'name' => 'Homepage',
                'content' => Html::tag('div', '[simple-slider key="home-slider"][/simple-slider]') .
                    Html::tag(
                        'div',
                        '[featured-product-categories title="Top Categories" subtitle="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim Nullam nunc varius."][/featured-product-categories]'
                    ) .
                    Html::tag('div', '[flash-sale title="Best deals for you"][/flash-sale]') .
                    Html::tag(
                        'div',
                        '[product-collections title="Exclusive Products"][/product-collections]'
                    ) .
                    Html::tag(
                        'div',
                        '[theme-ads key_1="IZ6WU8KUALYD" key_2="ILSFJVYFGCPZ" key_3="ZDOZUZZIU7FT"][/theme-ads]'
                    ) .
                    Html::tag(
                        'div',
                        '[trending-products title="Trending Products"][/trending-products]'
                    ) .
                    Html::tag(
                        'div',
                        '[product-blocks featured_product_title="Featured Products" top_rated_product_title="Top Rated Products" on_sale_product_title="On Sale Products"][/product-blocks]'
                    ) .
                    Html::tag(
                        'div',
                        '[featured-brands title="Our Brands"][/featured-brands]'
                    ) .
                    Html::tag(
                        'div',
                        '[featured-news title="Visit Our Blog" subtitle="Our Blog updated the newest trend of the world regularly"][/featured-news]'
                    ) .
                    Html::tag('div', '[testimonials title="Our Client Say!"][/testimonials]') .
                    Html::tag(
                        'div',
                        '[our-features icon1="flaticon-shipped" title1="Free Delivery" subtitle1="Free shipping on all US order or order above $200" icon2="flaticon-money-back" title2="30 Day Returns Guarantee" subtitle2="Simply return it within 30 days for an exchange" icon3="flaticon-support" title3="27/4 Online Support" subtitle3="Contact us 24 hours a day, 7 days a week"][/our-features]'
                    ) .
                    Html::tag(
                        'div',
                        '[newsletter-form title="Join Our Newsletter Now" subtitle="Register now to get updates on promotions."][/newsletter-form]'
                    )
                ,
                'template' => 'homepage',
            ],
            [
                'name' => 'Contact us',
                'content' => Html::tag('p', '[contact-form][/contact-form]'),
            ],
            [
                'name' => 'Blog',
                'content' => Html::tag('p', '---'),
                'template' => 'blog-sidebar',
            ],
            [
                'name' => 'About us',
                'content' => Html::tag('p', $faker->realText(500)),
            ],
            [
                'name' => 'FAQ',
                'content' => Html::tag('div', '[faqs][/faqs]'),
            ],
            [
                'name' => 'Location',
                'content' => Html::tag('p', $faker->realText(500)),
            ],
            [
                'name' => 'Affiliates',
                'content' => Html::tag('p', $faker->realText(500)),
            ],
            [
                'name' => 'Brands',
                'content' => Html::tag('p', '[all-brands][/all-brands]'),
            ],
            [
                'name' => 'Cookie Policy',
                'content' => Html::tag('h3', 'EU Cookie Consent') .
                    Html::tag(
                        'p',
                        'To use this website we are using Cookies and collecting some data. To be compliant with the EU GDPR we give you to choose if you allow us to use certain Cookies and to collect some Data.'
                    ) .
                    Html::tag('h4', 'Essential Data') .
                    Html::tag(
                        'p',
                        'The Essential Data is needed to run the Site you are visiting technically. You can not deactivate them.'
                    ) .
                    Html::tag(
                        'p',
                        '- Session Cookie: PHP uses a Cookie to identify user sessions. Without this Cookie the Website is not working.'
                    ) .
                    Html::tag(
                        'p',
                        '- XSRF-Token Cookie: Laravel automatically generates a CSRF "token" for each active user session managed by the application. This token is used to verify that the authenticated user is the one actually making the requests to the application.'
                    ),
            ],
        ];

        Page::truncate();
        PageTranslation::truncate();
        Slug::where('reference_type', Page::class)->delete();
        MetaBoxModel::where('reference_type', Page::class)->delete();
        LanguageMeta::where('reference_type', Page::class)->delete();

        foreach ($pages as $item) {
            $item['user_id'] = 1;

            if (! isset($item['template'])) {
                $item['template'] = 'default';
            }

            $page = Page::create($item);

            Slug::create([
                'reference_type' => Page::class,
                'reference_id' => $page->id,
                'key' => Str::slug($page->name),
                'prefix' => SlugHelper::getPrefix(Page::class),
            ]);
        }

        $translations = [
            [
                'name' => 'Trang chủ',
                'content' => Html::tag('div', '[simple-slider key="slider-trang-chu"][/simple-slider]') .
                    Html::tag(
                        'div',
                        '[featured-product-categories title="Danh mục nổi bật" subtitle="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim Nullam nunc varius."][/featured-product-categories]'
                    ) .
                    Html::tag('div', '[flash-sale title="Khuyến mãi tốt nhất cho bạn"][/flash-sale]') .
                    Html::tag(
                        'div',
                        '[product-collections title="Sản phẩm độc quyền"][/product-collections]'
                    ) .
                    Html::tag(
                        'div',
                        '[theme-ads key_1="IZ6WU8KUALYD" key_2="ILSFJVYFGCPZ" key_3="ZDOZUZZIU7FT"][/theme-ads]'
                    ) .
                    Html::tag(
                        'div',
                        '[trending-products title="Sản phẩm xu hướng"][/trending-products]'
                    ) .
                    Html::tag(
                        'div',
                        '[product-blocks featured_product_title="Nổi bật" top_rated_product_title="Xếp hạng cao nhất" on_sale_product_title="Đang khuyến mãi"][/product-blocks]'
                    ) .
                    Html::tag(
                        'div',
                        '[featured-brands title="Thương hiệu"][/featured-brands]'
                    ) .
                    Html::tag(
                        'div',
                        '[featured-news title="Tin tức" subtitle="Blog của chúng tôi cập nhật các xu hướng mới nhất của thế giới thường xuyên"][/featured-news]'
                    ) .
                    Html::tag('div', '[testimonials title="Nhận xét từ khách hàng!"][/testimonials]') .
                    Html::tag(
                        'div',
                        '[our-features icon1="flaticon-shipped" title1="Miễn phí vận chuyển" subtitle1="Giao hàng miễn phí cho tất cả các đơn đặt hàng tại Hoa Kỳ hoặc đơn hàng trên $200" icon2="flaticon-money-back" title2="Đảm bảo hoàn trả trong 30 ngày" subtitle2="Chỉ cần trả lại nó trong vòng 30 ngày để đổi" icon3="flaticon-support" title3="Hỗ trợ trực tuyến 27/4" subtitle3="Liên hệ với chúng tôi 24 giờ một ngày, 7 ngày một tuần"][/our-features]'
                    ) .
                    Html::tag(
                        'div',
                        '[newsletter-form title="Theo dõi bản tin ngay bây giờ" subtitle="Đăng ký ngay để cập nhật các chương trình khuyến mãi."][/newsletter-form]'
                    )
                ,
            ],
            [
                'name' => 'Liên hệ',
                'content' => Html::tag('p', '[contact-form][/contact-form]'),
            ],
            [
                'name' => 'Tin tức',
                'content' => Html::tag('p', '---'),
            ],
            [
                'name' => 'Về chúng tôi',
                'content' => Html::tag('p', $faker->realText(500)),
            ],
            [
                'name' => 'Câu hỏi thường gặp',
                'content' => Html::tag('div', '[faqs][/faqs]'),
            ],
            [
                'name' => 'Vị trí',
                'content' => Html::tag('p', $faker->realText(500)),
            ],
            [
                'name' => 'Chi nhánh',
                'content' => Html::tag('p', $faker->realText(500)),
            ],
            [
                'name' => 'Thương hiệu',
                'content' => Html::tag('p', '[all-brands][/all-brands]'),
            ],
            [
                'name' => 'Chính sách cookie',
                'content' => Html::tag('h3', 'EU Cookie Consent') .
                    Html::tag(
                        'p',
                        'To use this website we are using Cookies and collecting some data. To be compliant with the EU GDPR we give you to choose if you allow us to use certain Cookies and to collect some Data.'
                    ) .
                    Html::tag('h4', 'Essential Data') .
                    Html::tag(
                        'p',
                        'The Essential Data is needed to run the Site you are visiting technically. You can not deactivate them.'
                    ) .
                    Html::tag(
                        'p',
                        '- Session Cookie: PHP uses a Cookie to identify user sessions. Without this Cookie the Website is not working.'
                    ) .
                    Html::tag(
                        'p',
                        '- XSRF-Token Cookie: Laravel automatically generates a CSRF "token" for each active user session managed by the application. This token is used to verify that the authenticated user is the one actually making the requests to the application.'
                    ),
            ],
        ];

        foreach ($translations as $index => $item) {
            $item['lang_code'] = 'vi';
            $item['pages_id'] = $index + 1;

            PageTranslation::insert($item);
        }
    }
}
