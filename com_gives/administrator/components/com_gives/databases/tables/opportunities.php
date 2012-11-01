<?php

class ComGivesDatabaseTableOpportunities extends KDatabaseTableAbstract
{

	protected function _initialize(KConfig $config) {
		$config->base = "gives_opportunities";
		$config->name = "gives_view_opportunities";

		parent::_initialize($config);
	}


	public function insert(KDatabaseRowInterface $row)
	{
		$affected = parent::insert($row);

		if ($affected) {
			$data = $row->getData();

			$params = &JComponentHelper::getParams('com_gives');
			if ($params->get('send_emails')) {
				$this->_emailAdmin($data['title']);
			}
		}

		return $affected;
	}

	protected function _emailAdmin($title)
	{
		$params = &JComponentHelper::getParams('com_gives');
		$admins = $params->get('email_list');
		if ($admins === '')
			return;

		$view = $this->getService('com://admin/default.template.default');
		$view->loadIdentifier('com://admin/gives.view.opportunity.email_admin', array(
			'title'	=> $title
		));

		$this->_sendMail($admins, "New Sarnia Gives Opportunity", $view->render());
	}

	protected function _sendMail($to, $subject, $body)
	{
		$mailer		= JFactory::getMailer();
		$config		= JFactory::getConfig();

		$mailer->setSender(array(
			$config->getValue('config.mailfrom'),
			$config->getValue('config.fromname')
		));

		$mailer->addRecipient($to);
		$mailer->setSubject($subject);
		$mailer->setBody($body);
		$mailer->isHtml(true);
		$mailer->send();
	}
}