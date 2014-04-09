<?
	defined('KOOWA') or die;

$volunteers = $this->getService('com://admin/gives.controller.volunteers')
			->browse();

$email_volunteers = array();
$sms_volunteers = array();
foreach ($volunteers as $volunteer)
{
	if ($volunteer->lastminute_email)
		$email_volunteers[] = $volunteer;

	if ($volunteer->lastminute_sms)
		$sms_volunteers[] = $volunteer;
}


foreach ($opportunities as $opportunity):
	
	if ($opportunity->end_date != $opportunity->start_date)
		continue;

	if (strtotime($opportunity->end_date) < time() || strtotime($opportunity->end_date) > strtotime("+25 days"))
		continue;

	send_notification($opportunity, $email_volunteers, $sms_volunteers, $this);

endforeach;



function save_state($opportunity)
{
	$opportunity->notification_sent = 1;
	$opportunity->save();
}

function send_notification($opportunity, $email_volunteers, $sms_volunteers, $service)
{
	save_state($opportunity);

	foreach($email_volunteers as $volunteer)
	{
		$email = $volunteer->email;
		$first_name = $volunteer->first_name;
		send_email($email, $volunteer, $opportunity, $service);
	}
}

function send_email($to, $volunteer, $opportunity, $service)
{
	$view = $service->getService('com://admin/default.template.default');
	$view->loadIdentifier('com://admin/gives.view.volunteer.email_lastminute', array(
		'volunteer'=>$volunteer,
		'opportunity'=>$opportunity
	));

	$body = $view->render();
	$subject = 'Last Minute Volunteer Opportunity';

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

?>
