<?php
defined('_JEXEC') or die;
defined('KOOWA') or die;


KLoader::loadIdentifier('com://site/gives.mappings');
echo KService::get('com://site/gives.dispatcher')->dispatch();