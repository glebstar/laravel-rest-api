<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_data';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'params'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'params' => 'array',
    ];
}
