<?php

	class POIMapPageTest extends SapphireTest {
		public function testGetCMSFields() {
			$poiMapPage = new POIMapPage();
			
			// check extensions
			$this->assertTrue($poiMapPage->hasExtension('MapExtension'));
			$this->assertTrue($poiMapPage->hasExtension('PointsOfInterestLayerExtension'));
			
			// check that the location tab has been removed
			$fields = $poiMapPage->getCMSFields();
			$tab = $fields->findOrMakeTab('Root');
			$fields = $tab->FieldList();
			$names = array();
			foreach ($fields as $field) {
				$names[] = $field->getName();
			}
			$this->assertNotContains('Location', $names);
		}

}
