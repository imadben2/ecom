<?php

use Botble\Base\Forms\FormAbstract;
use Botble\SimpleSlider\Models\SimpleSliderItem;
use Botble\Ecommerce\Models\ProductCategory;
use Kris\LaravelFormBuilder\FormHelper;
use Theme\Shopwise\Fields\ThemeIconField;

register_page_template([
    'homepage' => __('Homepage'),
    'blog-sidebar' => __('Blog Sidebar'),
]);

register_sidebar([
    'id' => 'footer_sidebar',
    'name' => __('Footer sidebar'),
    'description' => __('Sidebar in the footer of site'),
]);

RvMedia::setUploadPathAndURLToPublic();

RvMedia::addSize('medium', 540, 600)->addSize('small', 540, 300);

if (is_plugin_active('ecommerce')) {
    add_action(BASE_ACTION_META_BOXES, function ($context, $object) {
        if (get_class($object) == ProductCategory::class && $context == 'advanced') {
            MetaBox::addMetaBox('additional_product_category_fields', __('Addition Information'), function () {
                $icon = null;
                $iconImage = null;
                $args = func_get_args();
                if (! empty($args[0])) {
                    $icon = MetaBox::getMetaData($args[0], 'icon', true);
                    $iconImage = MetaBox::getMetaData($args[0], 'icon_image', true);
                }

                return Theme::partial('product-category-fields', compact('icon', 'iconImage'));
            }, get_class($object), $context);
        }
    }, 24, 2);

    add_action([BASE_ACTION_AFTER_CREATE_CONTENT, BASE_ACTION_AFTER_UPDATE_CONTENT], function ($type, $request, $object) {
        if (get_class($object) == ProductCategory::class) {
            if ($request->has('icon')) {
                MetaBox::saveMetaBoxData($object, 'icon', $request->input('icon'));
            }

            if ($request->has('icon_image')) {
                MetaBox::saveMetaBoxData($object, 'icon_image', $request->input('icon_image'));
            }
        }
    }, 230, 3);
}

Form::component('themeIcon', Theme::getThemeNamespace() . '::partials.icons-field', [
    'name',
    'value' => null,
    'attributes' => [],
]);

add_filter('form_custom_fields', function (FormAbstract $form, FormHelper $formHelper) {
    if (! $formHelper->hasCustomField('themeIcon')) {
        $form->addCustomField('themeIcon', ThemeIconField::class);
    }

    return $form;
}, 29, 2);

app()->booted(function () {
    if (is_plugin_active('ecommerce')) {
        ProductCategory::resolveRelationUsing('icon', function ($model) {
            return $model->morphOne(\Botble\Base\Models\MetaBox::class, 'reference')->where('meta_key', 'icon');
        });
    }
});

if (is_plugin_active('simple-slider')) {
    add_filter(BASE_FILTER_BEFORE_RENDER_FORM, function ($form, $data) {
        if (get_class($data) == SimpleSliderItem::class) {
            $value = MetaBox::getMetaData($data, 'button_text', true);

            $form
                ->addAfter('link', 'button_text', 'text', [
                    'label' => __('Button text'),
                    'label_attr' => ['class' => 'control-label'],
                    'value' => $value,
                    'attr' => [
                        'placeholder' => __('Ex: Shop now'),
                    ],
                ])
                ->addAfter('image', 'tablet_image', 'mediaImage', [
                    'label' => __('Tablet Image'),
                    'label_attr' => ['class' => 'control-label'],
                    'value' => $data->getMetaData('tablet_image', true),
                    'help_block' => [
                        'text' => __('For devices with width from 768px to 1200px, if empty, will use the image from the desktop.'),
                    ],
                ])
                ->addAfter('tablet_image', 'mobile_image', 'mediaImage', [
                    'label' => __('Mobile Image'),
                    'label_attr' => ['class' => 'control-label'],
                    'value' => $data->getMetaData('mobile_image', true),
                    'help_block' => [
                        'text' => __('For devices with width less than 768px, if empty, will use the image from the tablet.'),
                    ],
                ]);
        }

        return $form;
    }, 124, 3);

    add_action([BASE_ACTION_AFTER_CREATE_CONTENT, BASE_ACTION_AFTER_UPDATE_CONTENT], function ($screen, $request, $data) {
        if (get_class($data) == SimpleSliderItem::class) {
            if ($request->has('button_text')) {
                MetaBox::saveMetaBoxData($data, 'button_text', $request->input('button_text'));
            }

            if ($request->has('tablet_image')) {
                MetaBox::saveMetaBoxData($data, 'tablet_image', $request->input('tablet_image'));
            }

            if ($request->has('mobile_image')) {
                MetaBox::saveMetaBoxData($data, 'mobile_image', $request->input('mobile_image'));
            }
        }
    }, 120, 3);
}
