<?php

class ComGivesTemplateHelperForm extends KTemplateHelperAbstract
{
	
	public function checkbox($name, $value, $config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
			'name'	=> '',
			'value'	=> '',
			'class'	=> '',
		))->append(array(
			'id'	=> $config->name.'_field',
			'title'	=> trim(ucwords(str_replace(array('_'), ' ', $config->name))),
		));
		
		return "<dl>
			<dt><label for=\"{$config->id}\">{$name}:</label></dt>
			<dd><input type=\"\" /></dd>
		</dl>";
	}
	
	public function text($config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
			'name'	=> '',
			'value'	=> '',
			'klass'	=> '',
		))->append(array(
			'id'	=> $config->name.'_field',
			'title'	=> trim(ucwords(str_replace(array('_'), ' ', $config->name))),
		));
		
		return "<dl>
			<dt><label for=\"{$config->id}\">{$config->title}:</label></dt>
			<dd><input 
					type=\"text\" 
					name=\"{$config->name}\" 
					id=\"{$config->id}\" 
					class=\"{$config->klass}\" 
					value=\"{$config->value}\" />
			</dd>
		</dl>";
	}
	
	public function password($config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
			'name'	=> 'password',
			'klass'	=> '',
		))->append(array(
			'id'	=> $config->name.'_field',
			'title'	=> trim(ucwords(str_replace(array('_'), ' ', $config->name))),
		));
		
		return "<dl>
			<dt><label for=\"{$config->id}\">{$config->title}:</label></dt>
			<dd><input 
					type=\"password\" 
					name=\"{$config->name}\" 
					id=\"{$config->id}\" 
					class=\"{$config->klass}\" />
			</dd>
		</dl>";
	}
	
	public function submit($config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
			'title' => 'Submit',
			'klass'	=> '',
		));
		
		return "<dl>
			<dt>&nbsp;</dt>
			<dd><input type=\"submit\"
					class=\"{$config->klass}\" 
					value=\"{$config->title}\" /></dd>
		</dl>";
	}
	
	
}