<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    /**
     * [$guarded description]
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * [$guarded description]
     *
     * @var string
     */
    protected $table = "actions";

    protected $fillable = ['group','name','action','description','state'];

    const ACTION_STATE_ZERO = 0;

    const ACTION_STATE_ONE = 1;

}
