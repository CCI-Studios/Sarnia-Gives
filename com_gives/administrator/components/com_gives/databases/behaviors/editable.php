<?php

class ComGivesDatabaseBehaviorEditable extends KDatabaseBehaviorAbstract
{
    
    public function canEdit()
    {
        $user = JFactory::getUser();
        if ($user->gid >= 23) // yeah admin
            return true;
            
        if (isset($this->user_id) && ($this->user_id == $user->id))
            return true;
        return false;
    }
}