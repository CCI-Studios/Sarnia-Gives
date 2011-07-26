<?php

class ComGivesModelOpportunities extends ComDefaultModelDefault
{
	
	public function __construct(KConfig $config)
	{
		parent::__construct($config);
		
		$this->_state
			->insert('organization_id', 'int')
			->insert('locations', 'raw')
			->insert('skills', 'raw')
			->insert('interests', 'raw')
			->insert('enabled', 'boolean', false)
			->insert('fuzzy', 'boolean', false)
			->insert('address', 'string')
			->insert('distance', 'float')
			->remove('sort')
			->insert('sort', 'cmd', 'title'); // FIXME group by organization
	}	
	
	public function _buildQueryColumns(KDatabaseQuery $query)
	{
		if (is_numeric($this->_state->distance) && isset($this->_state->address)) {
			list($lat, $lng) = $this->_getLocation($this->_state->address);
			$query->select("(6371 * ACOS(SIN(RADIANS($lat))*SIN(RADIANS(tbl.lat)) + COS(RADIANS($lat))*COS(RADIANS(tbl.lat))*COS(RADIANS($lng)-RADIANS(tbl.lng)))) AS distance");
		}
		
		parent::_buildQueryColumns($query);
	}
	
	
	public function _buildQueryWhere(KDatabaseQuery $query)
	{
		$state = $this->_state;
		
		if ($state->fuzzy) {
			$op = 'OR';
		} else {
			$op = 'AND';
		}
		
		if ($state->enabled) {
			$query->where('tbl.enabled', '=', '1');
		}
		
		if (is_numeric($state->organization_id)) {
			$query->where('tbl.gives_organization_id', '=', $state->organization_id);
		}
		
		if (count($state->locations)) {
			$query->where('tbl.locations', 'REGEXP', implode('|', $state->locations), $op);
		}
		
		if (count($state->interests)) {
			$query->where('tbl.interests', 'REGEXP', implode('|', $state->interests), $op);
		}
		
		if (count($state->skills)) {
			$query->where('tbl.skills', 'REGEXP', implode('|', $state->skills), $op);
		}
		
		if (isset($state->address)) {
			list($lat, $lng) = $this->_getLocation($state->address);
			$query->where('tbl.lat', '!=', 'null');
			$query->where('tbl.lng', '!=', 'null');
		}
		
		parent::_buildQueryWhere($query);
	}
	
	protected function _getLocation($address)
	{
		$ch = curl_init();
		$url = 'http://maps.googleapis.com/maps/api/geocode/json?';
		$data = array('sensor=false','address='.$address);
		$url = $url . str_replace(' ', '+', implode('&', $data));
		
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$results = json_decode(curl_exec($ch));
		
		if (isset($results->status) && $results->status === 'REQUEST_DENIED') {
			return false;
		} else {
			$data = $results->results[0]->geometry->location;
			return array($data->lat, $data->lng);
		}
	}
}