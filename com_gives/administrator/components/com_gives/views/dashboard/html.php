<?php

class ComGivesViewDashboardHtml extends ComGivesViewHtml
{
    
    public function display()
    {
        KRequest::set('get.hidemainmenu', 0);
        
        return parent::display();
    }
    
}