<?php

class AccountController extends CrudController
{
	protected $moduleName = 'account';
	protected $controllerDirectory = 'account/';
	protected $masterTemplate = 'layout/back';
	protected $navigationType = 'backend';
	protected $jsDirectory = 'js/back/';
}