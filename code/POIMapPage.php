<?php

namespace WebOfTalent\MappablePointsOfInterest;

use Page;

use PageController;



class POIMapPage extends Page
{
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->removeByName('Location');

        return $fields;
    }
}

class POIMapPage_Controller extends PageController
{
}
