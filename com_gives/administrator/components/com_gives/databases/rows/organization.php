<?php

class ComGivesDatabaseRowOrganization extends KDatabaseRowDefault
{
	
	public function canEdit()
	{
		$user = KFactory::get('lib.joomla.user');
		return ($user->id === $this->user_id);
	}
	
	public function canView()
	{
		return true;
	}
}