<?php

namespace WebOfTalent\MappablePointsOfInterest;

use WebOfTalent\MappablePointsOfInterest\PointOfInterest;
use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;

class PointsOfInterestLayer extends DataObject
{
    private static $db = array(
        'Name' => 'Varchar',
        'ShowGuideMarkers' => 'Boolean',
    );

    private static $many_many = array('PointsOfInterest' => PointOfInterest::class);

    private static $has_one = array(
        'DefaultIcon' => Image::class,
    );
}
