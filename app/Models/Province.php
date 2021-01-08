<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Province
 *
 * @property $id
 * @property $name
 * @property $lat
 * @property $long
 *
 * @property Regency[] $regencies
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Province extends Model
{
    public $timestamps = false;
    
    static $rules = [
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
    protected $fillable = ['name','lat','long'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function regencies()
    {
        return $this->hasMany('App\Models\Regency', 'province_id', 'id');
    }
    

}
