<?php

class PointsOfInterestLayerTest extends SapphireTest {

	public function testUpdateCMSFields() {
		$layer = new PointsOfInterestLayer();
		$fields = $layer->getCMSFields();
		$root = $fields->fieldByName('Root.Main');
		$fields = $root->FieldList();
		$names = array();
		foreach ($fields as $field) {
			$names[] = $field->getName();
		}
		
		error_log(print_r($names,1)); 
		$expected = array('Name', 'ShowGuideMarkers', 'DefaultIcon');
		$this->assertEquals($expected, $names);

	}

}


class PointsOfInterestLayerTestObjectTO extends DataObject implements TestOnly {
}