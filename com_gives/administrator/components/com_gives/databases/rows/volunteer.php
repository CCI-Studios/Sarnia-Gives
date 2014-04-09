<?php

class ComGivesDatabaseRowVolunteer extends KDatabaseRowTable
{
	
	public function display_name()
	{
		return $this->first_name .' '. $this->last_name;
	}
	
	public function save()
	{	
		$this->interests = json_encode($this->interests);
		$this->locations = json_encode($this->locations);
		$this->skills = json_encode($this->skills);
		$this->lastminute_email = (int)$this->lastminute_email;
		
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
		
		if (isset($data['lastminute_email'])) {
			$data['lastminute_email'] = (int)$data['lastminute_email'];
		} else {
			$data['lastminute_email'] = 0;
		}
		
		if (isset($data['lastminute_sms'])) {
			$data['lastminute_sms'] = (int)$data['lastminute_sms'];
		} else {
			$data['lastminute_sms'] = 0;
		}
		
		parent::setData($data, $modified);
		
		return $this;
	}
}