<?php

namespace Modules\Meeting\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection = 'pgsql_meeting';

    protected $fillable = [
        'id',
        'city_id',
        'app_date',
        'start_time',
        'place',
        'entity_id',
        'dependence_id',
        'subject',
        'reason',
        'observation' 
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $casts = [ /* 'field_name' => 'field_type' */ ];
    
    
    protected static function newFactory()
    {
        return \Modules\Meeting\Database\Factories\MeetingFactory::new();
    }

    /*
        public function myChild()
        {
            return $this->hasMany(MyChild::class);
        }
    */
}
