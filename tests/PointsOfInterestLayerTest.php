<?php

namespace WebOfTalent\MappablePointsOfInterest;





use WebOfTalent\MappablePointsOfInterest\PointsOfInterestLayer;
use SilverStripe\Dev\SapphireTest;
use SilverStripe\ORM\DataObject;
use SilverStripe\Dev\TestOnly;



class PointsOfInterestLayerTest extends SapphireTest
{
    public function testUpdateCMSFields()
    {
        $layer = new PointsOfInterestLayer();
        $fields = $layer->getCMSFields();
        $root = $fields->fieldByName('Root.Main');
        $fields = $root->FieldList();
        $names = array();
        foreach ($fields as $field) {
            $names[] = $field->getName();
        }

        $expected = array('Name', 'ShowGuideMarkers', 'DefaultIcon');
        $this->assertEquals($expected, $names);
    }
}

class PointsOfInterestLayerTestObjectTO extends DataObject implements TestOnly
{
}
