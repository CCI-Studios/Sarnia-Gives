<?php

class JElementOrganization extends JElement
{
	var $_name = 'Organization';
	
	public function fetchElement($name, $value, &$node, $control_name)
	{
		$lb = KFactory::tmp('admin::com.gives.template.helper.listbox');
		return $lb->organizations(array('name'=>$control_name.'['.$name.']', 'selected'=>$value));
	}
}