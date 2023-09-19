<?php

namespace Modules\Meeting\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection = 'pgsql_meeting';

    protected $fillable = [
        'id',     
        'name'     
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $casts = [ /* 'field_name' => 'field_type' */ ];
    
        
    protected static function newFactory()
    {
        return \Modules\Meeting\Database\Factories\PositionFactory::new();
    }
}
