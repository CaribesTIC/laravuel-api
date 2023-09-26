<?php

namespace Modules\Meeting\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Attende extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection = 'pgsql_meeting';

    protected $fillable = [
        'id',     
        'meeting_id',     
        'idcard',     
        'fullname',     
        'email',     
        'phone',     
        'observation',     
        'entity_id',     
        'dependency_id',     
        'position_id'     
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $casts = [ /* 'field_name' => 'field_type' */ ];
    
    protected $with = ['entity','dependency','position'];
    
    public function meeting()
    {
        return $this->belongsTo(\Modules\Meeting\Entities\Meeting::class);
    }

    public function entity()
    {
        return $this->belongsTo(\Modules\Meeting\Entities\Entity::class);
    }

    public function dependency()
    {
        return $this->belongsTo(\Modules\Meeting\Entities\Dependency::class);
    }

    public function position()
    {
        return $this->belongsTo(\Modules\Meeting\Entities\Position::class);
    }

    protected static function newFactory()
    {
        return \Modules\Meeting\Database\Factories\AttendeFactory::new();
    }
}
