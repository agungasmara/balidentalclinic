<?php

class SysController extends CrudController
{
	protected $moduleName = 'sys';
	protected $controllerDirectory = 'sys/';
	protected $masterTemplate = 'layout/back';
	protected $navigationType = 'backend';
	protected $jsDirectory = 'js/back/';
	protected $urlSearchSegment = 4;
}