<?php
defined('_JEXEC') or die;
defined('KOOWA') or die;

KLoader::load('site::com.gives.mappings');
echo KFactory::get('site::com.gives.dispatcher')->dispatch();