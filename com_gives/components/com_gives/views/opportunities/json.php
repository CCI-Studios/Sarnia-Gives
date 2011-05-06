<?php

class ComGivesViewOpportunitiesJson extends KViewJson
{
	
	public function display()
	{
		if(empty($this->output)) 
        {
            $model = $this->getModel();
			$items = $model->getList()->toArray();
			$data = array();
			
			foreach ($items as $index=>$row) {
				$data[$index] = array_filter($row);
			}
            
			$this->output = json_encode($data);
        }

        return parent::display();
		
	}
}