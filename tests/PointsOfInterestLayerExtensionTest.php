<?php

	class PointsOfInterestLayerExtensionTest extends SapphireTest {
		
	public function setUpOnce() {
		$this->requiredExtensions = array(
			'POILayerExtensionPageTO' => array('MapExtension', 'PointsOfInterestLayerExtension')
		);
		parent::setUpOnce();
	}

	public function testUpdateCMSFields() {
		$page = new POILayerExtensionPageTO();
		$fields = $page->getCMSFields();
		$tab = $fields->findOrMakeTab('Root.MapLayers');
		$fields = $tab->FieldList();
		$names = array();
		foreach ($fields as $field) {
			$names[] = $field->getName();
		}
		 
		$this->assertEquals(array('POI Layers'), $names);
	}

}


class POILayerExtensionPageTO extends Page implements TestOnly {
}
