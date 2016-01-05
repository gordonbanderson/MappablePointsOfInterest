<?php

class PointsOfInterestLayerExtension extends DataExtension
{
    public static $many_many = array(
        'PointsOfInterestLayers' => 'PointsOfInterestLayer',
    );

    public static $belongs_many_many_extraFields = array(
        'PointsOfInterestLayers' => array(
            'SortOrder' => 'Int',
        ),
    );

    /**
     * Update cms fields - add list of POIs.
     *
     * @param FieldList $fields list of existing fields on the object
     */
    public function updateCMSFields(FieldList $fields)
    {
        $gridConfig2 = GridFieldConfig_RelationEditor::create();
        $gridConfig2->getComponentByType(
            'GridFieldAddExistingAutocompleter')->
            setSearchFields(array('Name')
        );
        $gridConfig2->getComponentByType('GridFieldPaginator')->setItemsPerPage(100);
        $gridField2 = new GridField('POI Layers', 'POI Layers:',
            $this->owner->PointsOfInterestLayers(),
            $gridConfig2
        );
        $fields->addFieldToTab('Root.MapLayers', $gridField2);
    }

    /**
     * Use extension point to add the markers
     * @param  MapAPI &$map reference to object representing the map
     * @param  $autozoom will be altered to true for autozoom, false not to
     */
    public function updateBasicMap(&$map, &$autozoom)
    {
        foreach($this->owner->PointsOfInterestLayers() as $layer) {
            $layericon = $layer->DefaultIcon();
            if ($layericon->ID === 0) {
                $layericon = null;
            }
            foreach ($layer->PointsOfInterest() as $poi) {
                if ($poi->MapPinEdited) {
                    if ($poi->MapPinIconID == 0 && $layericon) {
                        $poi->CachedMapPinURL = $layericon->getAbsoluteURL();
                    }
                    $map->addMarkerAsObject($poi);

                    // we have a point of interest, so turn on auto zoom
                    $autozoom = true;
                }
            }
        }
        $map->setClusterer(true);
    }

    /**
     * Only set has geo to true if layers exist
     * @param  boolean &$hasGeo will be set to true if any layers
     */
    public function updateHasGeo(&$hasGeo)
    {
        if ($this->owner->PointsOfInterestLayers()->count() > 0) {
            $hasGeo = true;
        }
    }
}
