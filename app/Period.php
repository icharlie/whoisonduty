<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Period extends Model {

    protected $table = 'periods';

    protected $fillable = ['start', 'end', 'user_id'];


    public function user()
    {
        return $this->belongsTo('App\\User');
    }

    public function getStartAttribute($date)
    {
        return $this->formatDate($date);
    }

    public function getEndAttribute($date)
    {
        return $this->formatDate($date);
    }

    private function formatDate($date)
    {
        return Carbon::createFromFormat('Y-m-d', $date)->format('Y-m-d');
    }
}
