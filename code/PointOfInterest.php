<?php

class PointOfInterest extends DataObject
{
    private static $description = 'Represents a point of interest on a map, e.g. railway station';

    private static $belongs_many_many = array('PointsOfInterestLayers' => 'PointsOfInterestLayer');

    private static $db = array(
        'Name' => 'Varchar',
    );

    private static $summary_fields = array('Name', 'Lat', 'Lon');

    private static $default_sort = 'Name';

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Main', new TextField('Name', 'Name of the item on the map'));

        $layers = $this->PointsOfInterestLayers();
        $ids = array();
        foreach ($layers->getIterator() as $layer) {
            array_push($ids, $layer->ID);
            if ($layer->ShowGuideMarkers) {
                $this->ShowGuideMarkers = true;
            }
        }
        $csv = implode(',', $ids);

        if ($this->ShowGuideMarkers && strlen($csv) > 0) {
            $sql = 'ID IN (SELECT DISTINCT  PointOfInterestID from ';
            $sql .= 'PointsOfInterestLayer_PointsOfInterest WHERE PointsOfInterestLayerID ';
            $sql .= "IN ($csv))";

            $pois = self::get()->where($sql);
            $this->owner->getMapField()->setGuidePoints($pois);
        }

        return $fields;
    }
}
