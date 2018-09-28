<?php

namespace WebOfTalent\MappablePointsOfInterest;


use WebOfTalent\MappablePointsOfInterest\PointsOfInterestLayer;
use WebOfTalent\MappablePointsOfInterest\PointOfInterest;
use SilverStripe\Assets\Image;
use SilverStripe\Admin\ModelAdmin;



class PointsOfInterestAdmin extends ModelAdmin
{
    private static $managed_models = array(PointsOfInterestLayer::class, PointOfInterest::class);
    private static $url_segment = 'poi';
    private static $menu_title = 'Points of Interest';
    private static $menu_icon = '/mappable/icons/menuicon.png';

    private static $has_one = array(
        'DefaultIcon' => Image::class,
    );
}
