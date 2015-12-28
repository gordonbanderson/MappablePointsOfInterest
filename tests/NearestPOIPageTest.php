<?php

	class NearestPOIPageTest extends SapphireTest {
		public function testCMSFields() {
			$np = new NearestPOIPage();
			$fields = $np->getCMSFields();
			$tab = $fields->findOrMakeTab('Root.Layer');
			$fields = $tab->FieldList();
			$names = array();
			foreach ($fields as $field) {
				$names[] = $field->getName();
			}
			$expected = array('PointsOfInterestLayerID');
			$this->assertEquals($expected, $names);
		}


		public function testFind() {
			$this->markTestSkipped('TODO');
		}

}
