<?php

namespace WebOfTalent\MappablePointsOfInterest;



use WebOfTalent\MappablePointsOfInterest\PointsOfInterestAdmin;
use SilverStripe\Dev\SapphireTest;



class PointsOfInterestAdminTest extends SapphireTest
{
    public function testManagedModels()
    {
        $modelAdmin = new PointsOfInterestAdmin();
        $models = $modelAdmin->getManagedModels();
        $expected = array(
            'PointsOfInterestLayer' => array(
                'title' => 'Points Of Interest Layer',
            ),
            'PointOfInterest' => array(
                'title' => 'Point Of Interest',
            ),
        );
        $this->assertEquals($expected, $models);
    }
}
