<?php

namespace Theme\Shopwise\Fields;

use Assets;
use Kris\LaravelFormBuilder\Fields\FormField;
use Theme;

class ThemeIconField extends FormField
{
    /**
     * {@inheritDoc}
     */
    protected function getTemplate()
    {
        Assets::addScriptsDirectly(Theme::asset()->url('js/icons-field.js'))
            ->addStylesDirectly(Theme::asset()->url('css/flaticon.css'))
            ->addStylesDirectly(Theme::asset()->url('css/ionicons.min.css'))
            ->addStylesDirectly(Theme::asset()->url('css/linearicons.css'));

        return Theme::getThemeNamespace() . '::partials.fields.icons-field';
    }
}
