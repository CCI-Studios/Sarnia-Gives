<?php

class ComGivesViewDashboardHtml extends ComGivesViewHtml
{
    
    public function display()
    {
        $this->getToolbar()->reset()->setTitle('Overview');
        KRequest::set('get.hidemainmenu', 0);
        
        return parent::display();
    }
    
}