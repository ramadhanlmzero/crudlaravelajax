<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Achievement;

class Alumni extends Model
{
    protected $table = 'alumnis';
    protected $guarded = [];

    public $incrementing = false;

    public function achievement()
    {
        return $this->hasMany(Achievement::class, 'id', 'alumnis_id');
    }
}
