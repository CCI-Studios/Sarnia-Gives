<?php

class ComGivesControllerCtwhour extends ComDefaultControllerDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);

        $this->registerCallback('after.add', array($this, 'afterAdd'));

        $command = $this->getService('com://site/gives.command.validate');
        $this->getCommandChain()->enqueue($command);
    }

    public function afterAdd(KCommandContext $context)
    {
        $ctwhour = $context->result;
        $first_name = $ctwhour->first_name;
        $last_name = $ctwhour->last_name;
        $address1 = $ctwhour->address1;
        $address2 = $ctwhour->address2;
        $city = $ctwhour->city;
        $postal_code = $ctwhour->postal_code;
        $phone = $ctwhour->phone;
        $email = $ctwhour->email;
        $organization = $ctwhour->organization;
        $hours = $ctwhour->hours;

        $to = 'ctw@sarniagives.com';
        $from = 'ctw@sarniagives.com';
        $subject = 'CTW Hours Logged';
        $message = <<<EOD
Name: $first_name $last_name
Address: $address1 $address2
City: $city
Postal Code: $postal_code
Phone: $phone
Email: $email
Organization: $organization
Hours: $hours
EOD;
        $headers = "From: $from\r\nX-Mailer: PHP/" . phpversion();

        mail($to, $subject, $message, $headers);

        if ($this->getRequest()->layout === 'form') {
            $this->setRedirect('index.php?option=com_gives&view=ctwhour&layout=thanks');
        } else {
            $this->setRedirect('index.php?option=com_gives&view=ctwhour&layout=form&id='. KRequest::get('get.id', 'int'));
        }

        return true;
    }
}