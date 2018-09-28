<?php

namespace WebOfTalent\MappablePointsOfInterest;



use WebOfTalent\MappablePointsOfInterest\POIMapPage;
use WebOfTalent\MappablePointsOfInterest\PointsOfInterestLayerExtension;
use SilverStripe\Dev\SapphireTest;



    class POIMapPageTest extends SapphireTest
    {
        public function testGetCMSFields()
        {
            $poiMapPage = new POIMapPage();

            // check extensions
            $this->assertTrue($poiMapPage->hasExtension('MapExtension'));
            $this->assertTrue($poiMapPage->hasExtension(PointsOfInterestLayerExtension::class));

            // check that the location tab has been removed
            $fields = $poiMapPage->getCMSFields();
            $tab = $fields->findOrMakeTab('Root');
            $fields = $tab->FieldList();
            $names = array();
            foreach ($fields as $field) {
                $names[] = $field->getName();
            }
            $this->assertNotContains('Location', $names);
        }
    }
