<?php

namespace Modules\Meeting\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection = 'pgsql_meeting';

    protected $fillable = [
        'id',     
        'email',     
        'type',     
        'identification_card',     
        'business_name',     
        'phone',     
        'country_id',     
        'domicile'     
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $casts = [ /* 'field_name' => 'field_type' */ ];
    
    protected $with = ['country'];
    
    public function country()
    {
        return $this->belongsTo(\Modules\Meeting\Entities\Country::class);
    } 
        
    protected static function newFactory()
    {
        return \Modules\Meeting\Database\Factories\PersonFactory::new();
    }
}
