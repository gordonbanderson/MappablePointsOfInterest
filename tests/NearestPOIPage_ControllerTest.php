<?php

class NearestPOIPage_ControllerTest extends FunctionalTest {

	protected static $fixture_file = 'mappable-poi/tests/pointsofinterest.yml';
	
	public function testFind() {
		// page needs to be live
		$nearPage = $this->objFromFixture('NearestPOIPage', 'StationFinder');
		$nearPage->doPublish();
		$link = $nearPage->Link();
		error_log("POI PAGE LINK:".$link);

		$pages = NearestPOIPage::get();
		error_log($pages->first()->PointsOfInterestLayerID);

		$url = $link;
		$response = $this->get($url);
		$this->assertEquals(200, $response->getStatusCode());

		// location is MBK
		$url = $link . 'find?lat=13.7444513&lng=100.5290196';
		$response = $this->get($url);
		$this->assertEquals(200, $response->getStatusCode());
		$expected = array(
			'Ratchathewi',
			'Phaya Thai',
			'Chit Lom',
			'Victory Monument',
			'Nana',
			'Sanam Pao',
			'Ari',
			'Saphan Khwai',
			'Mo Chit'
		);
		$this->assertExactMatchBySelector('table#nearestPOIs td.name', $expected);

		// location is victory monument
		$url = $link . 'find?lat=13.7650776&lng=100.5369724';
		$response = $this->get($url);
		$this->assertEquals(200, $response->getStatusCode());
		$expected = array(
			'Victory Monument',
			'Phaya Thai',
			'Sanam Pao',
			'Ratchathewi',
			'Ari',
			'Chit Lom',
			'Nana',
			'Saphan Khwai',
			'Mo Chit'
		);
		$this->assertExactMatchBySelector('table#nearestPOIs td.name', $expected);
	}

}
