<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use User;


class Period extends Model {

    protected $table = 'periods';

    protected $fillable = ['start', 'end', 'user_id'];


    public function user()
    {
        return $this->belongsTo('App\\User');
    }

}
