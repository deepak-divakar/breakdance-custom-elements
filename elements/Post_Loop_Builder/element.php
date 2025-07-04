<?php

namespace BreakdanceCustomElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "BreakdanceCustomElements\\PostLoopBuilder",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class PostLoopBuilder extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return 'DatabaseIcon';
    }

    static function tag()
    {
        return 'div';
    }

    static function tagOptions()
    {
        return [];
    }

    static function tagControlPath()
    {
        return false;
    }

    static function name()
    {
        return 'Custom Post Loop';
    }

    static function className()
    {
        return 'bde-post-loop';
    }

    static function category()
    {
        return 'dynamic';
    }

    static function badge()
    {
        return false;
    }

    static function slug()
    {
        return get_class();
    }

    static function template()
    {
        return file_get_contents(__DIR__ . '/html.twig');
    }

    static function defaultCss()
    {
        return file_get_contents(__DIR__ . '/default.css');
    }

    static function defaultProperties()
    {
        return false;
    }

    static function defaultChildren()
    {
        return false;
    }

    static function cssTemplate()
    {
        $template = file_get_contents(__DIR__ . '/css.twig');
        return $template;
    }

    static function designControls()
    {
        return [getPresetSection(
      "EssentialElements\\posts-list-design",
      "List",
      "list",
       ['type' => 'popout']
     ), c(
        "post",
        "Post",
        [c(
        "background",
        "Background",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Padding",
      "padding",
       ['type' => 'popout']
     )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      ), c(
        "container",
        "Container",
        [c(
        "background",
        "Background",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_padding_all",
      "Padding",
      "padding",
       ['type' => 'popout']
     )],
        ['type' => 'section'],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\posts-pagination-design",
      "Pagination",
      "pagination",
       ['condition' => ['0' => ['0' => ['path' => 'content.filter_bar.enable', 'operand' => 'is not set', 'value' => '']]], 'type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\tabs_design",
      "Filter Bar",
      "filter_bar",
       ['condition' => ['0' => ['0' => ['path' => 'content.filter_bar.enable', 'operand' => 'is set', 'value' => '']]], 'type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\spacing_margin_y",
      "Spacing",
      "spacing",
       ['type' => 'popout']
     )];
    }

    static function contentControls()
    {
        return [c(
        "repeated_block",
        "Repeated Block",
        [c(
        "global_block",
        "Global Block",
        [],
        ['type' => 'global_block_chooser', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "tag",
        "Tag",
        [],
        ['type' => 'dropdown', 'layout' => 'inline', 'items' => ['0' => ['value' => 'article', 'text' => 'article'], '1' => ['text' => 'section', 'value' => 'section'], '2' => ['text' => 'div', 'value' => 'div']]],
        false,
        false,
        [],
      ), c(
        "advanced",
        "Advanced",
        [c(
        "alternates",
        "Alternates",
        [c(
        "global_block",
        "Global Block",
        [],
        ['type' => 'global_block_chooser', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "position",
        "Position",
        [],
        ['type' => 'number', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "repeat",
        "Repeat",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "frequency",
        "Frequency",
        [],
        ['type' => 'number', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.repeat', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "static_items",
        "Static Items",
        [c(
        "global_block",
        "Global Block",
        [],
        ['type' => 'global_block_chooser', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "position",
        "Position",
        [],
        ['type' => 'number', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "repeat",
        "Repeat",
        [],
        ['type' => 'toggle', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "frequency",
        "Frequency",
        [],
        ['type' => 'number', 'layout' => 'vertical', 'condition' => ['0' => ['0' => ['path' => '%%CURRENTPATH%%.repeat', 'operand' => 'is set', 'value' => '']]]],
        false,
        false,
        [],
      )],
        ['type' => 'repeater', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "query",
        "Query",
        [c(
        "query",
        "Query",
        [],
        ['type' => 'wp_query', 'layout' => 'vertical'],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical', 'sectionOptions' => ['type' => 'accordion']],
        false,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\posts-pagination-content",
      "Pagination",
      "pagination",
       ['condition' => ['0' => ['0' => ['path' => 'content.filter_bar.enable', 'operand' => 'is not set', 'value' => '']]], 'type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\posts-filter-bar",
      "Filter Bar",
      "filter_bar",
       ['type' => 'popout']
     )];
    }

    static function settingsControls()
    {
        return [];
    }

    static function dependencies()
    {
        return ['0' =>  ['scripts' => ['%%BREAKDANCE_ELEMENTS_PLUGIN_URL%%dependencies-files/swiper@8/swiper-bundle.min.js','%%BREAKDANCE_ELEMENTS_PLUGIN_URL%%dependencies-files/breakdance-swiper/breakdance-swiper.js'],'styles' => ['%%BREAKDANCE_ELEMENTS_PLUGIN_URL%%dependencies-files/swiper@8/swiper-bundle.min.css','%%BREAKDANCE_ELEMENTS_PLUGIN_URL%%dependencies-files/swiper@8/breakdance-swiper-preset-defaults.css'],'builderCondition' => 'return {{ design.list.layout == \'slider\' }};','frontendCondition' => 'return {{ design.list.layout == \'slider\' }};','title' => 'Slider',],'1' =>  ['title' => 'Slider - Frontend','inlineScripts' => ['window.BreakdanceSwiper().update({
  id: \'%%ID%%\', selector:\'%%SELECTOR%%\',
  settings:{{ design.list.slider.settings|json_encode }},
  paginationSettings:{{ design.list.slider.pagination|json_encode }},
});'],'frontendCondition' => 'return {{ design.list.layout == \'slider\' }};','builderCondition' => 'return false;',],'2' =>  ['inlineScripts' => ['window.BreakdancePostsList?.loadMorePostsInit(
  {
    selector: "%%SELECTOR%%",
    postId: "%%POSTID%%",
    id: "%%ID%%"
  }
)'],'frontendCondition' => '{% if content.pagination.pagination == "load_more" and not content.filter_bar.enable %}
return true;
{% else%}
 return false;
{% endif %}','builderCondition' => 'return false;','scripts' => ['%%BREAKDANCE_ELEMENTS_PLUGIN_URL%%dependencies-files/breakdance-pagination@1/pagination.js'],'title' => 'Pagination - Load more',],'3' =>  ['inlineScripts' => ['window.BreakdancePostsList?.infiniteScrollInit(
  {
    selector: "%%SELECTOR%%",
    postId: "%%POSTID%%",
    id: "%%ID%%"
  }
)'],'frontendCondition' => '{% if content.pagination.pagination == "infinite" and not content.filter_bar.enable %}
return true;
{% else%}
 return false;
{% endif %}','builderCondition' => 'return false;','scripts' => ['%%BREAKDANCE_ELEMENTS_PLUGIN_URL%%dependencies-files/breakdance-pagination@1/pagination.js'],'title' => 'Pagination - Infinite scroll',],'4' =>  ['title' => 'Filter Bar','scripts' => ['%%BREAKDANCE_ELEMENTS_PLUGIN_URL%%dependencies-files/isotope-layout@3.0.6/isotope.pkgd.min.js','%%BREAKDANCE_ELEMENTS_PLUGIN_URL%%dependencies-files/breakdance-filter@1/filter.js','%%BREAKDANCE_ELEMENTS_PLUGIN_URL%%dependencies-files/custom-tabs@1/tabs.js'],'builderCondition' => 'return {{ content.filter_bar.enable ? \'true\' : \'false\' }};','frontendCondition' => 'return {{ content.filter_bar.enable ? \'true\' : \'false\' }};','styles' => ['%%BREAKDANCE_ELEMENTS_PLUGIN_URL%%dependencies-files/custom-tabs@1/tabs.css'],],'5' =>  ['title' => 'Filter Bar - Frontend','inlineScripts' => ['new BreakdanceFilter(\'%%SELECTOR%%\', {
  layout: \'{{ design.list.layout }}\',
  isVertical: {{ design.filter_bar.vertical|json_encode }},
  horizontalAt: {{ design.filter_bar.horizontal_at|json_encode }}
});'],'frontendCondition' => 'return {{ content.filter_bar.enable ? \'true\' : \'false\' }};','builderCondition' => 'return false;',],];
    }

    static function settings()
    {
        return ['withDependenciesInHtml' => true, 'proOnly' => false];
    }

    static function addPanelRules()
    {
        return false;
    }

    static public function actions()
    {
        return [

'onPropertyChange' => [['script' => '{% if design.list.layout == \'slider\' %}
window.BreakdanceSwiper().update({
  id: \'%%ID%%\', selector:\'%%SELECTOR%%\',
  settings:{{ design.list.slider.settings|json_encode }},
  paginationSettings:{{ design.list.slider.pagination|json_encode }},
});
{% else %}
window.swiperInstances && window.swiperInstances[\'%%ID%%\'] && window.BreakdanceSwiper().destroy(
  \'%%ID%%\'
);
{% endif %}','dependencies' => ['design.list.layout'],
],['script' => 'if (window.breakdanceFilterInstances && window.breakdanceFilterInstances[%%ID%%]) {
  window.breakdanceFilterInstances[%%ID%%].update({
    layout: \'{{ design.list.layout }}\'
  });
}',
],],

'onMovedElement' => [['script' => '{% if design.list.layout == \'slider\' %}
window.BreakdanceSwiper().update({
  id: \'%%ID%%\', selector:\'%%SELECTOR%%\',
  settings:{{ design.list.slider.settings|json_encode }},
  paginationSettings:{{ design.list.slider.pagination|json_encode }},
});
{% endif %}',
],['script' => 'if (window.breakdanceFilterInstances && window.breakdanceFilterInstances[%%ID%%]) {
  window.breakdanceFilterInstances[%%ID%%].update();
}',
],],

'onBeforeDeletingElement' => [['script' => '{% if design.list.layout == \'slider\' %}
window.swiperInstances && window.swiperInstances[\'%%ID%%\'] && window.BreakdanceSwiper().destroy(
  \'%%ID%%\'
);
{% endif %}',
],['script' => 'if (window.breakdanceFilterInstances && window.breakdanceFilterInstances[%%ID%%]) {
  window.breakdanceFilterInstances[%%ID%%].destroy();
  delete window.breakdanceFilterInstances[%%ID%%];
}',
],],

'onMountedElement' => [['script' => '{% if design.list.layout == \'slider\' %}
window.BreakdanceSwiper().update({
  id: \'%%ID%%\', selector:\'%%SELECTOR%%\',
  settings:{{ design.list.slider.settings|json_encode }},
  paginationSettings:{{ design.list.slider.pagination|json_encode }},
});
{% endif %}',
],['script' => 'if (!window.breakdanceFilterInstances) window.breakdanceFilterInstances = {};

{% if content.filter_bar.enable %}
  window.breakdanceFilterInstances[%%ID%%] = new BreakdanceFilter(\'%%SELECTOR%%\', {
    layout: \'{{ design.list.layout }}\',
    isVertical: {{ design.filter_bar.vertical|json_encode }},
    horizontalAt: {{ design.filter_bar.horizontal_at|json_encode }}
  });
{% endif %}',
],],];
    }

    static function nestingRule()
    {
        return ["type" => "final",   ];
    }

    static function spacingBars()
    {
        return ['0' => ['location' => 'outside-top', 'cssProperty' => 'margin-top', 'affectedPropertyPath' => 'design.spacing.margin_top.%%BREAKPOINT%%'], '1' => ['location' => 'outside-bottom', 'cssProperty' => 'margin-bottom', 'affectedPropertyPath' => 'design.spacing.margin_bottom.%%BREAKPOINT%%']];
    }

    static function attributes()
    {
        return false;
    }

    static function experimental()
    {
        return false;
    }

    static function order()
    {
        return 2100;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
    }

    static function additionalClasses()
    {
        return false;
    }

    static function projectManagement()
    {
        return false;
    }

    static function propertyPathsToWhitelistInFlatProps()
    {
        return ['design.list.one_item_at', 'design.list.layout', 'design.pagination.load_more_button.custom.size.full_width_at', 'design.pagination.load_more_button.style', 'design.pagination.load_more_button.styles.size.full_width_at', 'design.pagination.load_more_button.styles', 'design.filter_bar.responsive.visible_at', 'design.filter_bar.horizontal_at', 'design.pagination.vertical_at'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return ['content', 'design.list.layout', 'design.filter_bar'];
    }
}
