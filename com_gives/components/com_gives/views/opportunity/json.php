<?php

class ComGivesViewOpportunityJson extends KViewJson
{
	
	public function display()
	{
		if(empty($this->output)) 
        {
            $model = $this->getModel();
			$data = $model->getItem()->toArray();
			$data = array_filter($data);
            
			$this->output = json_encode($data);
        }

        return parent::display();
		
	}
}