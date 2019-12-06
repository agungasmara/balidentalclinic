<?php
use Illuminate\Database\Eloquent\Model as Eloquent;

class M_Blog_Type extends Eloquent
{
	protected $table = 'blog_types';
	protected $fillable = ['name'];
}