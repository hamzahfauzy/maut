<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Regency
 *
 * @property $id
 * @property $province_id
 * @property $name
 * @property $lat
 * @property $long
 *
 * @property District[] $districts
 * @property Province $province
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Regency extends Model
{
    
    static $rules = [
		'province_id' => 'required',
		'name' => 'required',
		'lat' => 'required',
		'long' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['province_id','name','lat','long'];

    public $timestamps = false;


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function districts()
    {
        return $this->hasMany('App\Models\District', 'regency_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function province()
    {
        return $this->hasOne('App\Models\Province', 'id', 'province_id');
    }
    

}
