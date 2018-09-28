<?php

namespace WebOfTalent\MappablePointsOfInterest;



use WebOfTalent\MappablePointsOfInterest\PointOfInterest;
use WebOfTalent\MappablePointsOfInterest\PointsOfInterestLayer;
use SilverStripe\Dev\SapphireTest;



class PointOfInterestTest extends SapphireTest
{
    protected static $fixture_file = 'mappable-poi/tests/pointsofinterest.yml';

    public function testUpdateCMSFields()
    {
        $poi = new PointOfInterest();
        $fields = $poi->getCMSFields();
        $tab = $fields->findOrMakeTab('Root.Main');
        $fields = $tab->FieldList();
        $names = array();
        foreach ($fields as $field) {
            $names[] = $field->getName();
        }

        $this->assertEquals(array('Name'), $names);
    }

    public function testShowGuideMarkers()
    {
        $layer = $this->objFromFixture(PointsOfInterestLayer::class, 'BTS');
        error_log('LAYER: '.$layer->Name);
        $pois = $layer->PointsOfInterest();
        $poi = $pois->first();

        // guidemarkers off, expect null returned
        $layer->ShowGuideMarkers = 0;
        $layer->write();
        $poi->getCMSFields();
        $guidepoints = $poi->getMapField()->getGuidePoints();
        $this->assertNull($guidepoints);

        // guidemarkers on, convert datalist to an array of coordinates
        $layer->ShowGuideMarkers = 1;
        $layer->write();
        $poi->getCMSFields();
        $guidepoints = $poi->getMapField()->getGuidePoints();
        $expected = array();
        $coors = array();
        foreach ($guidepoints as $gp) {
            $coors[] = array($gp->Lat, $gp->Lon);
        }

        $expected = array(
            array(13.77965803301, 100.54461523531),
            array(13.744081610619, 100.54311513861),
            array(13.802594511242, 100.55379467004),
            array(13.74054138487, 100.55545772112),
            array(13.756924089277, 100.53381164654),
            array(13.751846080459, 100.53157277536),
            array(13.772614550915, 100.54209276599),
            array(13.793846082833, 100.54974883766),
            array(13.762764662241, 100.53706848861),
        );
        $this->assertEquals($expected, $coors);
    }
}
