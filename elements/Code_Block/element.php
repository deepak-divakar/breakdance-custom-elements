<?php

namespace BreakdanceCustomElements;

use function Breakdance\Elements\c;
use function Breakdance\Elements\PresetSections\getPresetSection;


\Breakdance\ElementStudio\registerElementForEditing(
    "BreakdanceCustomElements\\CodeBlock",
    \Breakdance\Util\getdirectoryPathRelativeToPluginFolder(__DIR__)
);

class CodeBlock extends \Breakdance\Elements\Element
{
    static function uiIcon()
    {
        return 'CodeIcon';
    }

    static function tag()
    {
        return 'div';
    }

    static function tagOptions()
    {
        return ['div', 'span', 'p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'header', 'footer', 'nav', 'aside'];
    }

    static function tagControlPath()
    {
        return false;
    }

    static function name()
    {
        return 'Custom Code Block';
    }

    static function className()
    {
        return 'bde-code-block';
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
        return [c(
        "wrapper",
        "Wrapper",
        [c(
        "width",
        "Width",
        [],
        ['type' => 'unit', 'layout' => 'inline'],
        true,
        false,
        [],
      ), c(
        "background",
        "Background",
        [],
        ['type' => 'color', 'layout' => 'inline', 'colorOptions' => ['type' => 'solidAndGradient']],
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
      "EssentialElements\\simpleLayout",
      "Layout",
      "layout",
       ['type' => 'popout']
     ), getPresetSection(
      "EssentialElements\\typography_with_align",
      "Typography",
      "typography",
       ['type' => 'popout']
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
        "php_code",
        "PHP Code",
        [],
        ['codeOptions' => ['language' => 'x-php'], 'type' => 'code', 'layout' => 'vertical'],
        false,
        false,
        [],
      ), c(
        "css_code",
        "CSS Code",
        [],
        ['type' => 'code', 'layout' => 'vertical', 'codeOptions' => ['language' => 'css']],
        false,
        false,
        [],
      ), c(
        "javascript_code",
        "JavaScript Code",
        [],
        ['type' => 'code', 'layout' => 'vertical', 'codeOptions' => ['language' => 'javascript']],
        false,
        false,
        [],
      ), c(
        "execute_javascript",
        "Execute JavaScript",
        [],
        ['type' => 'trigger_action_button', 'layout' => 'inline', 'items' => ['0' => ['value' => 'true', 'text' => 'Execute', 'icon' => 'CodeIcon']], 'triggerActionsButtonOptions' => ['text' => 'Execute']],
        false,
        false,
        [],
      ), c(
        "disable_builder_label",
        "Disable Builder Label",
        [],
        ['type' => 'toggle', 'layout' => 'inline', 'items' => ['0' => ['value' => 'hidden', 'text' => 'hidden', 'icon' => 'EyeSlashSolidIcon'], '1' => ['text' => 'visible', 'value' => 'visible', 'icon' => 'EyeSolidIcon']]],
        false,
        false,
        [],
      ), c(
        "builder_label",
        "Builder Label",
        [],
        ['type' => 'text', 'layout' => 'vertical', 'placeholder' => '', 'condition' => ['path' => 'content.content.disable_builder_label', 'operand' => 'is not set', 'value' => '']],
        false,
        false,
        [],
      )],
        ['type' => 'section', 'layout' => 'vertical'],
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
        return ['0' =>  ['inlineScripts' => ['{{ content.content.javascript_code }}'],'builderCondition' => 'return false;','frontendCondition' => 'return true;','title' => 'Frontend only dependencies',],];
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
        return [

'onPropertyChange' => [['script' => '{{ content.content.javascript_code }}
','dependencies' => ['content.content.execute_javascript'],
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
        return 10;
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
        return ['looksGood' => 'yes', 'optionsGood' => 'yes', 'optionsWork' => 'yes'];
    }

    static function propertyPathsToWhitelistInFlatProps()
    {
        return ['design.layout.horizontal.vertical_at'];
    }

    static function propertyPathsToSsrElementWhenValueChanges()
    {
        return ['content.content.php_code'];
    }
}
