<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class M_App_Setting extends Eloquent
{
	protected $table = 'app_settings';
	protected $fillable = ['code', 'name', 'type', 'value'];
}