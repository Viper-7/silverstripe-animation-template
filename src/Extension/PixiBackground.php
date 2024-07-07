<?php
namespace App\Extension;

use SilverStripe\Core\Extension;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\NumericField;
use SilverStripe\Forms\CheckboxField;
use TractorCow\SliderField\SliderField;

class PixiBackgroundSiteConfig extends Extension
{
    private static $db = [
        'InitialDirt' => 'Int',
        'DirtyRate' => 'Int',
        'CharacterSize' => 'Int',
        'CharacterSpeed' => 'Int',
        'DisableBackground' => 'Boolean',
    ];

    private static $defaults = [
        'InitialDirt' => 2000,
        'DirtyRate' => 20,
        'CharacterSize' => 100,
        'CharacterSpeed' => 1,
        'DisableBackground' => false,
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab('Root.Background', CheckboxField::create('DisableBackground', 'Disable Animated Background'));
        $fields->addFieldToTab('Root.Background', SliderField::create('InitialDirt', 'Initial Dirt', 0, 10000)->setRightTitle('The amount of dirt on the screen'));
        $fields->addFieldToTab('Root.Background', SliderField::create('DirtyRate', 'Dirty Rate', 0, 100)->setRightTitle('The rate at which the screen gets dirty'));
        $fields->addFieldToTab('Root.Background', SliderField::create('CharacterSize', 'Character Size', 10, 500)->setRightTitle('The size of the character in pixels'));
        $fields->addFieldToTab('Root.Background', SliderField::create('CharacterSpeed', 'Character Speed', 1, 10)->setRightTitle('The speed of the character'));
    }
}