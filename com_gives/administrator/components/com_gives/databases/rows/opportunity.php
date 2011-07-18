<?php

class ComGivesDatabaseRowOpportunity extends KDatabaseRowTable
{	
	public function save()
	{	
		$this->interests = json_encode($this->interests);
		$this->locations = json_encode($this->locations);
		$this->skills = json_encode($this->skills);
		
		$ch = curl_init();
		$url = 'http://maps.googleapis.com/maps/api/geocode/json?';
		$data = array(
			'sensor=false',
			'address='.$this->address .', '.
				$this->city .', '. $this->province .', '.
				$this->postal .', '. 'canada'
		);
		$url = $url . str_replace(' ', '+', implode('&', $data));
		
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$results = json_decode(curl_exec($ch));
		
		if (isset($results->status) && $results->status === 'REQUEST_DENIED') {
			echo "denied";
		} else {
			$data = $results->results[0]->geometry->location;
			$this->lat = $data->lat;
			$this->lng = $data->lng;
		}
		
		return (bool)parent::save();
	}
	
	public function setData($data, $modified = true)
	{	
		if (isset($data['interests']) && is_string($data['interests'])) {
			$data['interests'] = json_decode($data['interests']);
		}
		
		if (isset($data['locations']) && is_string($data['locations'])) {
			$data['locations'] = json_decode($data['locations']);
		}
		
		if (isset($data['skills']) && is_string($data['skills'])) {
			$data['skills'] = json_decode($data['skills']);
		}
		
		parent::setData($data, $modified);
		return $this;
	}
}