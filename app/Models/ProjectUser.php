<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    protected $table = 'project_user';
    protected $fillable = [
        'user_id',
        'project_id'
    ];
}
