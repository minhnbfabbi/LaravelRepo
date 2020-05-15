<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Support\Jsonable;

class Notify extends Model implements Jsonable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'created_by', 'updated_by'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function users()
    {
    	return $this->belongsToMany('App\Models\User', 'user_notify', 'user_id', 'notify_id')->withPivot('is_read');
    }

    public function paginationApi($page = 1, $limit = 3)
    {
        return $this->paginate($limit, ['*'], 'page', $page);
    }
}
