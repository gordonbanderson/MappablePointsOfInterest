<?php

use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataExtension;

class ImagePointOfInterestExtension extends DataExtension
{
    private static $has_one = array(
        'POIImage' => Image::class,
    );
}
