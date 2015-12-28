<?php

class ImagePointOfInterestExtension extends DataExtension {
	private static $has_one = array(
		'POIImage' => 'Image'
	);
}
