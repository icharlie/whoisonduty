<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model {

    protected $table = 'topics';

	//
    protected $fillable = ['name'];

    public function period()
    {
        return $this->hasMany('App\\Period');
    }
}
