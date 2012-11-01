<?php

class ComGivesControllerRenew extends ComDefaultControllerResource
{

	protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'request'   => array('layout' => 'default')
        ));

        parent::_initialize($config);
    }


    protected function _actionPost(KCommandContext $context)
    {

    	jimport('joomla.application.component.helper');
		$component = JComponentHelper::getParams('com_gives');

    	$req = 'cmd=_notify-validate';
		foreach ($_POST as $key => $value) {
			$value = urlencode(stripslashes($value));
			$req .= "&$key=$value";
		}

		if ($component->get('paypal_sandbox') == 1) {
			$url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
		} else {
			$url = 'https://www.paypal.com/cgi-bin/webscr';
		}

		$ch = curl_init ($url);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
	    curl_setopt($ch, CURLOPT_POST, 1);
	    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE);
	    curl_setopt($ch, CURLOPT_POSTFIELDS, $req);

	    $fetched = curl_exec($ch);
	    $lines = explode("\n", $fetched);
	    curl_close($ch);

	    $transaction = $this->getService('com://site/gives.database.row.transaction');
	    $transaction->gives_organization_id = $_POST['custom'];
	    $transaction->created_on = date('Y-m-d H:m:s');
	    $transaction->ipn_txn_id = $_POST['txn_id'];

		if (strcmp($lines[0], "VERIFIED") == 0) {
			$transaction->completed = 1;

			$organization = $this->getService('com://site/gives.model.organizations')
								->set('id', $_POST['custom'])
								->getItem();
			$expiry = $organization->expires;

			if (strtotime($expiry) > time()) { // expire 1 year from current expiry date
				$expiry = date("Y-m-d", strtotime(date("Y-m-d", strtotime($expiry)) . " + 365 day"));
			} else { // expire 1 year from today
				$expiry = date("Y-m-d", strtotime(date("Y-m-d", time()) . " + 365 day"));
			}

			$organization->expires = $expiry; // add 1 year
			$organization->save();
		} else if (strcmp($lines[0], "INVALID") == 0) {
			$transaction->completed = 0;
			$transaction->ipn_error = print_r($_POST, 1);
		}
		$transaction->save();

		//return parent::_actionPost($context);
    }

}