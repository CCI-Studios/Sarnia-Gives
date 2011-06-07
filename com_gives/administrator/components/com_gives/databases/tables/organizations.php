<?php

class ComGivesDatabaseTableOrganizations extends KDatabaseTableAbstract
{
    
    protected function _initialize(KConfig $config)
    {
        $config->behaviors = array(
            'admin::com.gives.database.behavior.editable'
        );
        
        parent::_initialize($config);
    }
}