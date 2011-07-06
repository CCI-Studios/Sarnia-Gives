<?php

class ComGivesTemplateHelperForm extends KTemplateHelperAbstract
{
	
	public function checkbox($name, $value, $config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
			'_name'	=> '',
			'klass'	=> '',
		))->append(array(
			'_id'	=> $config->name.'_field',
			'title'	=> trim(ucwords(str_replace(array('_'), ' ', $config->name))),
			'value' => $config->{$config->name},
		));
		
		return "<div class=\"field\">
			<div><label for=\"{$config->_id}\">{$name}:</label></div>
			<div><input type=\"\" /></div>
		</div>";
	}
	
	public function text($config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
			'name'	=> '',
			'klass'	=> '',
		))->append(array(
			'_id'	=> $config->name.'_field',
			'_title'	=> trim(ucwords(str_replace(array('_'), ' ', $config->name))),
			'value' => $config->{$config->name},
		));		
		
		return "<div class=\"field\">
			<div><label for=\"{$config->_id}\">{$config->_title}:</label></div>
			<div><input 
					type=\"text\" 
					name=\"{$config->name}\" 
					id=\"{$config->_id}\" 
					class=\"{$config->klass}\" 
					value=\"{$config->value}\" />
			</div>
		</div>";
	}
	
	public function password($config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
			'name'	=> 'password',
			'klass'	=> '',
		))->append(array(
			'_id'	=> $config->name.'_field',
			'title'	=> trim(ucwords(str_replace(array('_'), ' ', $config->name))),
		));
		
		return "<div class=\"field\">
			<div><label for=\"{$config->id}\">{$config->title}:</label></div>
			<div><input 
					type=\"password\" 
					name=\"{$config->name}\" 
					id=\"{$config->_id}\" 
					class=\"{$config->klass}\" />
			</div>
		</div>";
	}
	
	public function submit($config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
			'_title' => 'Submit',
			'klass'	=> '',
		));
		
		return "<div class=\"field\">
			<div>&nbsp;</div>
			<div><input type=\"submit\"
					class=\"{$config->klass}\" 
					value=\"{$config->_title}\" /></div>
		</div>";
	}
	
	
}