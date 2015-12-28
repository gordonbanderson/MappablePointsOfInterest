<?php

class PointOfInterestTest extends SapphireTest {
	

	public function testUpdateCMSFields() {
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

}
