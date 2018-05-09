<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'desciption',
        'company_id',
        'user_id',
        'project_id',
        'days',
        'hours'
    ];


    public function users()
    {
        return $this->hasMany('App\User');
    }


    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }


    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }


}
