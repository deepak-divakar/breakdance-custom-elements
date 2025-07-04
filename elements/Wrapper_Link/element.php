<?php

namespace BreakdanceCustomElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "BreakdanceCustomElements\\WrapperLink",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class WrapperLink extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return 'LinkIcon';
    }

    static function tag()
    {
        return 'a';
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
        return 'Custom Wrapper Link';
    }

    static function className()
    {
        return 'bde-container-link';
    }

    static function category()
    {
        return 'advanced';
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
        return ['content' => ['content' => ['url' => 'https://breakdance.com/']]];
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
      "EssentialElements\\simpleLayout",
      "Layout",
      "layout",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\LessFancyBackground",
      "Background",
      "background",
       ['type' => 'popout']
     ), c(
        "container",
        "Container",
        [c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      ), c(
        "min_height",
        "Min Height",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      ), getPresetSection(
      "EssentialElements\\borders",
      "Borders",
      "borders",
       ['type' => 'popout']
     ), c(
        "hover",
        "Hover",
        [c(
        "background",
        "Background",
        [],
        ['type' => 'color', 'layout' => 'inline', 'colorOptions' => ['type' => 'solidAndGradient']],
        false,
        false,
        [],
      ), c(
        "border_color",
        "Border Color",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        false,
        [],
      ), c(
        "shadow",
        "Shadow",
        [],
        ['type' => 'shadow', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "transition_duration",
        "Transition Duration",
        [],
        ['type' => 'unit', 'layout' => 'inline', 'unitOptions' => ['types' => ['0' => 'ms']], 'rangeOptions' => ['min' => 1, 'max' => 1000, 'step' => 1]],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'inline', 'sectionOptions' => ['type' => 'popout']],
        false,
        false,
        [],
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
      ), c(
        "text_colors",
        "Text Colors",
        [c(
        "headings",
        "Headings",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), c(
        "text",
        "Text",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      ), c(
        "brand",
        "Brand",
        [],
        ['type' => 'color', 'layout' => 'inline'],
        false,
        true,
        [],
      )],
        ['type' => 'section'],
        false,
        false,
        [],
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
        "content",
        "Content",
        [c(
        "link",
        "Link",
        [],
        ['type' => 'link', 'layout' => 'vertical', 'linkOptions' => ['hideAdvanced' => true]],
        false,
        false,
        [],
      ), c(
        "warning",
        "Warning",
        [],
        ['type' => 'alert_box', 'layout' => 'vertical', 'alertBoxOptions' => ['style' => 'info', 'content' => '<p><strong>Important Tip</strong><br><br>Elements that contain links should not be placed inside a Wrapper Link element.<br><br>Doing so will create invalid HTML and could cause unexpected behavior.</p>']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'sectionOptions' => ['type' => 'accordion']],
        false,
        false,
        [],
      )];
    }

    static function settingsControls()
    {
        return [];
    }

    static function dependencies()
    {
        return false;
    }

    static function settings()
    {
        return ['proOnly' => false];
    }

    static function addPanelRules()
    {
        return false;
    }

    static public function actions()
    {
        return false;
    }

    static function nestingRule()
    {
        return ["type" => "container-link",   ];
    }

    static function spacingBars()
    {
        return ['0' => ['location' => 'outside-top', 'cssProperty' => 'margin-top', 'affectedPropertyPath' => 'design.spacing.margin_top.%%BREAKPOINT%%'], '1' => ['location' => 'outside-bottom', 'cssProperty' => 'margin-bottom', 'affectedPropertyPath' => 'design.spacing.margin_bottom.%%BREAKPOINT%%']];
    }

    static function attributes()
    {
        return [['name' => 'href', 'template' => '{{ macros.getUntrimmedLinkUrl(content.content.link ?: \'#\')|trim }}'], ['name' => 'target', 'template' => '{{ content.content.link.openInNewTab ? \'_blank\' : \'_self\' }}'], ['name' => 'data-lightbox-id', 'template' => '{{ content.content.link.type == \'lightbox\'? \'%%POSTID%%-%%ID%%\' }}'], ['name' => 'data-type', 'template' => '{{ content.content.link.type }}'], ['name' => 'data-action', 'template' => '{{ content.content.link.type == \'action\' ? content.content.link.action|json_encode }}']];
    }

    static function experimental()
    {
        return false;
    }

    static function order()
    {
        return 0;
    }

    static function dynamicPropertyPaths()
    {
        return ['0' => ['accepts' => 'url', 'path' => 'content.content.link.url'], '1' => ['accepts' => 'image_url', 'path' => 'design.background.image'], '2' => ['accepts' => 'image_url', 'path' => 'design.background.overlay.image'], '3' => ['path' => 'settings.advanced.attributes[].value', 'accepts' => 'string']];
    }

    static function additionalClasses()
    {
        return [['name' => 'breakdance-link', 'template' => 'yes']];
    }

    static function projectManagement()
    {
        return false;
    }

    static function propertyPathsToWhitelistInFlatProps()
    {
        return ['design.layout.horizontal.vertical_at', 'design.background.image', 'design.background.overlay.image', 'design.background.image_settings.unset_image_at', 'design.background.image_settings.size', 'design.background.image_settings.height', 'design.background.image_settings.repeat', 'design.background.image_settings.position', 'design.background.image_settings.left', 'design.background.image_settings.top', 'design.background.image_settings.attachment', 'design.background.image_settings.custom_position', 'design.background.image_settings.width', 'design.background.overlay.image_settings.custom_position', 'design.background.image_size', 'design.background.overlay.image_size', 'design.background.overlay.type', 'design.background.image_settings'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return false;
    }
}
