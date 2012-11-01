<?php

class ComGivesTemplateHelperPaypal extends KTemplateHelperAbstract
{

	function renewal_form($config = array())
	{
		$config = new KConfig($config);

		jimport('joomla.application.component.helper');
		$component = JComponentHelper::getParams('com_gives');

		$params = array(
			"cmd" => "_xclick",
			"lc" => "US",
			"item_name" => "Sarnia Gives Renewal",
			"amount" => "130.00",
			"currency_code" => "CAD",
			"button_subtype" => "services",
			"no_note" => "1",
			"no_shipping" => "1",
			"rm" => "1", // use POST
			"return" => JURI::base()."thank-you.html",
			"cancel_return" => JURI::base()."index.php?option=com_gives&view=organization&id=".$config->id,
			"notify_url" => JURI::base().'index.php?option=com_gives&view=renew',
			//"bn" => "PP%2dBuyNowBF%3abtn_buynowCC_LG%2egif%3aNonHosted",
			"custom" => $config->id,
		);

		if ($component->get('paypal_sandbox') == 1) {
			$url = "https://www.sandbox.paypal.com/cgi-bin/webscr?";
			$params['business'] = $component->get('paypal_sandbox_account');
		} else {
			$url = "https://www.paypal.com/cgi-bin/webscr?";
			$params['business'] = $component->get('paypal_account');
		}

		$html = "<form action='$url' method='post'>\n";
		foreach($params as $name=>$value) {
			$html .= "\t<input type='hidden' name='$name' value='$value' />";
		}
		$html .= "\t<input type='submit' value='Extend your membership for 1 year' />\n";
		$html .= "</form>";

		return $html;
	}


}