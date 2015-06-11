<?php

class ImagePointOfInterestExtension extends DataExtension {
	private static $has_one = array(
		'POIImage' => 'Image'
	);

	/* The openstreetmap id is only for scripting purposes */
    public function updateCMSFields(FieldList $fields) {
	    //$osmid = $fields->removeByName('OpenStreetMapID');
	}
}
