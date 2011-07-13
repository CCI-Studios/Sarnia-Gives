<?php

/* models */
KFactory::map('site::com.gives.model.opportunities',
	'admin::com.gives.model.opportunities');
KFactory::map('site::com.gives.model.organizations',
	'admin::com.gives.model.organizations');
KFactory::map('site::com.gives.model.volunteers',
	'admin::com.gives.model.volunteers');

/* tables */
KFactory::map('site::com.gives.database.table.volunteers',
	'admin::com.gives.database.table.volunteers');

/* rows */
KFactory::map('site::com.gives.database.row.volunteer',
	'admin::com.gives.database.row.volunteer');

/* controller behaviors */
KFactory::map('site::com.default.controller.behavior.editable',
	'admin::com.default.controller.behavior.editable');
	
/* template helpers */
KFactory::map('site::com.gives.template.helper.listbox',
	'admin::com.gives.template.helper.listbox');
KFactory::map('site::com.gives.template.helper.select',
	'admin::com.gives.template.helper.select');