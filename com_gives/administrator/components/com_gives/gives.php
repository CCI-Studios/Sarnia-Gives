<?php
defined('_JEXEC') or die;
defined('KOOWA') or die;

error_reporting(E_ALL);
ini_set('display_errors', '1'); // FIXME Remove

echo KService::get('com://admin/gives.dispatcher')->dispatch();
