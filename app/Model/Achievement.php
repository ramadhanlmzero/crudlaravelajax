<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Alumni;

class Achievement extends Model
{
    protected $table = 'achievements';
    protected $guarded = [];

    public $incrementing = false;

    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'alumnis_id', 'id');
    }
}
