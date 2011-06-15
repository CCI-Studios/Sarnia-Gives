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