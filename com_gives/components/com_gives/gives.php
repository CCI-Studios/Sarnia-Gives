<?php
defined('_JEXEC') or die;
defined('KOOWA') or die;



echo KFactory::get('site::com.gives.dispatcher')->dispatch();