<?php

namespace Modules\Client\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection = 'pgsql_client';

    protected $fillable = [
        'id',
        'name', 
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $casts = [ /* 'field_name' => 'field_type' */ ];

    /*
        public function myChild()
        {
            return $this->hasMany(MyChild::class);
        }
    
        public function myParent()
        {
            return $this->belongsTo(\App\Models\MyParent::class);
        }
    */

    protected static function newFactory()
    {
        return \Modules\Client\Database\Factories\CountryFactory::new();
    }
}
