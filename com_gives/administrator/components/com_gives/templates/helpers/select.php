<?php

class ComGivesTemplateHelperSelect extends KTemplateHelperSelect
{
	public function interests($config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
			'name'		=> 'interests',
			'text'		=> 'text',
			'key'		=> 'value',
		))->append(array(
			'selected'	=> $config->{$config->name},
		));
		
		$options = array();
		
		$options[] = new KConfig(array('text'=>"Animals/Animal Services", 'value'=>"Animals"));
		$options[] = new KConfig(array('text'=>"Community Development", 'value'=>"Community Development"));
		$options[] = new KConfig(array('text'=>"Health &amp; Wellness", 'value'=>"Health & Wellness"));
		$options[] = new KConfig(array('text'=>"Arts &amp; Culture", 'value'=>"Arts & Culture"));
		$options[] = new KConfig(array('text'=>"Emergency/Crisis Services", 'value'=>"Emergency/Crisis Services"));
		$options[] = new KConfig(array('text'=>"Social Services &amp; Justice", 'value'=>"Social Services & Justice"));
		$options[] = new KConfig(array('text'=>"Children &amp; Youth", 'value'=>"Children & Youth"));
		$options[] = new KConfig(array('text'=>"Environment", 'value'=>"Environment"));
		$options[] = new KConfig(array('text'=>"Special Events", 'value'=>"Special Events"));
		
		$config->list = $options;
		
		return $this->checklist($config);
	}
	
	public function locations($config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
			'name'		=> 'locations',
			'text'		=> 'text',
			'key'		=> 'value',
		))->append(array(
			'selected'	=> $config->{$config->name},
		));
		
		$options = array();
		
		$options[] = new KConfig(array('text'=>"Brooke-Alvinston", 'value'=>"Brooke-Alvinston"));
		$options[] = new KConfig(array('text'=>"Lambton Shores", 'value'=>"Lambton Shores"));
		$options[] = new KConfig(array('text'=>"Point Edward", 'value'=>"Point Edward"));
		$options[] = new KConfig(array('text'=>"Sarnia", 'value'=>"Sarnia"));
		$options[] = new KConfig(array('text'=>"Dawn-Euphemia", 'value'=>"Dawn-Euphemia"));
		$options[] = new KConfig(array('text'=>"Oil Springs", 'value'=>"Oil Springs"));
		$options[] = new KConfig(array('text'=>"Plympton Wyoming", 'value'=>"Plympton Wyoming"));
		$options[] = new KConfig(array('text'=>"Enniskillen", 'value'=>"Enniskillen"));
		$options[] = new KConfig(array('text'=>"Petrolia", 'value'=>"Petrolia"));
		$options[] = new KConfig(array('text'=>"St. Clair", 'value'=>"St. Clair"));
		$options[] = new KConfig(array('text'=>"Location Flexible", 'value'=>"Location Flexible"));
		
		$config->list = $options;
		
		return $this->checklist($config);
	}
	
	public function skills($config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
			'name'		=> 'skills',
			'text'		=> 'text',
			'key'		=> 'value'
		))->append(array(
			'selected'	=> $config->{$config->name},
		));
		
		$options = array();
		
		$options[] = new KConfig(array('text'=>"Accounting", 'value'=>"Accounting"));
		$options[] = new KConfig(array('text'=>"Coaching", 'value'=>"Coaching"));
		$options[] = new KConfig(array('text'=>"Event Coordination", 'value'=>"Event Coordination"));
		$options[] = new KConfig(array('text'=>"IT", 'value'=>"IT"));
		$options[] = new KConfig(array('text'=>"Marketing & Communications", 'value'=>"Marketing & Communications"));
		$options[] = new KConfig(array('text'=>"Outreach", 'value'=>"Outreach"));
		$options[] = new KConfig(array('text'=>"Translation", 'value'=>"Translation"));
		$options[] = new KConfig(array('text'=>"Bilingual (Eng/Fr)", 'value'=>"Bilingual (Eng/Fr)"));
		$options[] = new KConfig(array('text'=>"Counseling", 'value'=>"Counseling"));
		$options[] = new KConfig(array('text'=>"Fundraising", 'value'=>"Fundraising"));
		$options[] = new KConfig(array('text'=>"Legal", 'value'=>"Legal"));
		$options[] = new KConfig(array('text'=>"Medical Assistance", 'value'=>"Medical Assistance"));
		$options[] = new KConfig(array('text'=>"PR", 'value'=>"PR"));
		$options[] = new KConfig(array('text'=>"Writing & Research", 'value'=>"Writing & Research"));
		$options[] = new KConfig(array('text'=>"Board Work", 'value'=>"Board Work"));
		$options[] = new KConfig(array('text'=>"General Administration", 'value'=>"General Administration"));
		$options[] = new KConfig(array('text'=>"Management Consulting", 'value'=>"Management Consulting"));
		$options[] = new KConfig(array('text'=>"Mentoring & Training", 'value'=>"Mentoring & Training"));
		$options[] = new KConfig(array('text'=>"Sports & Recreation", 'value'=>"Sports & Recreation"));
		
		$config->list = $options;
		
		return $this->checklist($config);
	}
	
	public function checklist( $config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
			'list' 		=> null,
			'name'   	=> 'id',
			'attribs'	=> array(),
			'key'		=> 'id',
			'text'		=> 'title',
			'selected'	=> null,
			'translate'	=> false,
			
			'select_all'	=> false
		));

		$name    = $config->name;
		$attribs = KHelperArray::toString($config->attribs);

		$script = "";
		$html = array();
		$html[] = "<ul id=\"checklist{$name}\" class=\"checklist\">\n";
		
		if ($config->select_all) {
			$html[] = "<li class=\"selectall\" style=\"width: 100%;\">";
			$html[] = "<input type=\"checkbox\" name=\"\" />";
			$html[] = "<label>". JText::_('Select All') ."</label>";
			$html[] = "</li>";
			
			$script  = "<script>";
			$script .= "	window.addEvent('domready', function () {\n";
			$script .= "		var ul, sa, lis;\n";
			$script .= "		ul = $('checklist{$name}');\n";
			$script .= "		sa = ul.getElement('.selectall input');\n";
			$script .= "		lis = ul.getElements('li input');\n";
			$script .= "		lis.splice(lis.indexOf(sa), 1);\n";
			$script .= "		sa.addEvents({\n";
			$script .= "			change: function() {\n";
			$script .= "				lis.each(function (el) {\n";
			$script .= "					el.checked = sa.checked;\n";
			$script .= "				});\n";
			$script .= "			}\n";
			$script .= "		});\n";
			$script .= "	});\n";
			$script .= "</script>";
		}
		
		foreach($config->list as $row)
		{
			$key  = $row->{$config->key};
			$text = $config->translate ? JText::_( $row->{$config->text} ) : $row->{$config->text};
			$id	  = isset($row->id) ? $row->id : null;

			$extra = '';

			if ($config->selected instanceof KConfig)
			{
				foreach ($config->selected as $value)
				{
					$sel = is_object( $value ) ? $value->{$config->key} : $value;
					if ($key == $sel)
					{
						$extra .= 'checked="checked"';
						break;
					}
				}
			} 
			else $extra .= ($key == $config->selected) ? 'checked="checked"' : '';

			$html[] = "<li>";
			$html[] = '<input type="checkbox" name="'.$name.'[]" id="'.$name.$key.'" value="'.$key.'" '.$extra.' '.$attribs.' />';
			$html[] = '<label for="'.$name.$key.'">'.$text.'</label>';
			$html[] = '</li>';
		}
		$html[] = "</ul>";
		$html[] = $script;

		return implode(PHP_EOL, $html);
	}
	
}