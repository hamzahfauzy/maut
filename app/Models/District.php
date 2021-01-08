<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class District
 *
 * @property $id
 * @property $regency_id
 * @property $name
 * @property $lat
 * @property $long
 *
 * @property News[] $news
 * @property Regency $regency
 * @property Village[] $villages
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class District extends Model
{
    
    static $rules = [
		'regency_id' => 'required',
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
    protected $fillable = ['regency_id','name','lat','long'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function news()
    {
        return $this->hasMany('App\Models\News', 'district_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function regency()
    {
        return $this->hasOne('App\Models\Regency', 'id', 'regency_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function villages()
    {
        return $this->hasMany('App\Models\Village', 'district_id', 'id');
    }
    

}
