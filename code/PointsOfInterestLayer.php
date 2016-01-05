<?php

class PointsOfInterestLayer extends DataObject
{
    private static $db = array(
        'Name' => 'Varchar',
        'ShowGuideMarkers' => 'Boolean',
    );

    private static $many_many = array('PointsOfInterest' => 'PointOfInterest');

    private static $has_one = array(
        'DefaultIcon' => 'Image',
    );
}
