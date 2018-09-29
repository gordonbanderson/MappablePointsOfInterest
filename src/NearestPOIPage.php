<?php

namespace WebOfTalent\MappablePointsOfInterest;

use Page;






use WebOfTalent\MappablePointsOfInterest\PointsOfInterestLayer;
use SilverStripe\Forms\DropdownField;
use SilverStripe\ORM\DB;
use SilverStripe\ORM\ArrayList;
use SilverStripe\ORM\DataObject;
use SilverStripe\View\ArrayData;
use PageController;



class NearestPOIPage extends Page
{
    private static $has_one = array('PointsOfInterestLayer' => PointsOfInterestLayer::class);

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $field = DropdownField::create('PointsOfInterestLayerID', PointsOfInterestLayer::class,
            PointsOfInterestLayer::get()->map('ID', 'Title'))
                ->setEmptyString('-- Select one --');
        $fields->addFieldToTab('Root.Layer', $field);

        return $fields;
    }
}
