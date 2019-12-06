<?php
use Illuminate\Database\Eloquent\Model as Eloquent;
use Carbon\Carbon;

class M_Error_Email extends Eloquent
{
	protected $table = 'error_emails';
	protected $fillable = [
		'type', 'description'
	];
	protected $rules = [];


	public function getRules()
	{
		return $this->rules;
	}

	public function setData($input)
	{
		$data = [];
		return $data;
	}

	public function scopeIsType($query, $val)
	{
		return $query->where('type', '=', $val);
	}

	public function scopeIsToday($query)
	{
		$start = Carbon::today()->format('Y-m-d') . ' 00:00:00';
		$end = Carbon::today()->format('Y-m-d') . ' 23:59:59';
		return $query->whereBetween('created_at', [$start, $end]);
	}

}