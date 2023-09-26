<?php

namespace Modules\Meeting\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Approach extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection = 'pgsql_meeting';

    protected $fillable = [
        'id',     
        'meeting_id',     
        'approach',     
        'speaker',     
        'observation'     
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $casts = [ /* 'field_name' => 'field_type' */ ];
    
    public function meeting()
    {
        return $this->belongsTo(\Modules\Meeting\Entities\Meeting::class);
    }

    protected static function newFactory()
    {
        return \Modules\Meeting\Database\Factories\ApproachFactory::new();
    }
}
