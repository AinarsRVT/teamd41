<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'desc', 'image', 'status', 'price',
    ];

    public function getUsers(){
        return $this->belongsToMany('App\User', 'orders', 'projectid', 'userid')
            ->withPivot('status');
    }
}
