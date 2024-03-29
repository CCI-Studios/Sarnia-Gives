<?php

class ComGivesCommandValidate extends KCommand
{
	protected function _initialize(KConfig $config)
	{
		$config->append(array(
			'priority'   => KCommand::PRIORITY_HIGH,
		));

		parent::_initialize($config);
	}
	

	public function _controllerBeforeSave(KCommandContext $context)
	{
		return $this->_validateData($context);
	}
	
	public function _controllerBeforeApply(KCommandContext $context)
	{

		return $this->_validateData($context);
	}
	
	public function _controllerBeforeRead(KCommandContext $context)
	{
		$identifier = (string)$context->caller->getIdentifier();
		$tempData = KRequest::get('session.'.$identifier, 'raw');
		
		if (!empty($tempData)) {
			$tempData = unserialize($tempData);
			
			if ($tempData !== false) {
				$identifier = (string)$context->caller->getIdentifier();
				$model = $context->caller->getModel();
				$model->getItem()->setData($tempData);
			}
			
			KRequest::set('session.'.$identifier, null);
		}
		
		return true;
	}
	
	protected function _validateData(KCommandContext $context)
	{
		$identifier = (string)$context->caller->getIdentifier();
		$model = $context->caller->getModel();
		
		if (method_exists($model, 'validate')) {
			$data = $context->data;
			$validationErrors = $model->validate($data);
			
			if (!empty($validationErrors)) {
				$tempData = $data;
				unset($tempData['_token']);
				KRequest::set('session.'.$identifier, serialize((array)$tempData->getIterator()));
		
				$referrer = KRequest::referrer();
				$query = $referrer->getQuery(true);
				$query['id'] = $model->getState()->id;
				$referrer->setQuery($query);
		
				$context->caller->setRedirect((string)$referrer, implode('<br/>', $validationErrors), 'error');
				return false;
			}
		}
		
		return true;
	}
}