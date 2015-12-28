<?php

class OSMPointOfInterestExtensionTest extends SapphireTest {
	public function setUpOnce() {
		$this->requiredExtensions = array(
			'OSMTestPageTO' => array('MapExtension', 'OSMPointOfInterestExtension')
		);
		parent::setUpOnce();
	}

	public function testUpdateCMSFields() {
		$page = new OSMTestPageTO();
		$fields = $page->getCMSFields();
		$tab = $fields->findOrMakeTab('Root.Main');
		$fields = $tab->FieldList();
		$names = array();
		foreach ($fields as $field) {
			$names[] = $field->getName();
		}
		$this->assertNotContains('OpenStreetMapID', $names);
	}

}


class OSMTestPageTO extends Page implements TestOnly {

}
