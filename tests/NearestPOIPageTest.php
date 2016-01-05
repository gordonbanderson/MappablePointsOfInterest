<?php

class NearestPOIPageTest extends SapphireTest
{
    protected static $fixture_file = 'mappable-poi/tests/pointsofinterest.yml';

    public function testCMSFields()
    {
        $np = new NearestPOIPage();
        $fields = $np->getCMSFields();
        $tab = $fields->findOrMakeTab('Root.Layer');
        $fields = $tab->FieldList();
        $names = array();
        foreach ($fields as $field) {
            $names[] = $field->getName();
        }
        $expected = array('PointsOfInterestLayerID');
        $this->assertEquals($expected, $names);
    }
}
