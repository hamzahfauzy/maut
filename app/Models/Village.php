<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Village
 *
 * @property $id
 * @property $district_id
 * @property $name
 * @property $lat
 * @property $long
 *
 * @property District $district
 * @property News[] $news
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Village extends Model
{
    
    static $rules = [
		'district_id' => 'required',
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
    protected $fillable = ['district_id','name','lat','long'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function district()
    {
        return $this->hasOne('App\Models\District', 'id', 'district_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function news()
    {
        return $this->hasMany('App\Models\News', 'village_id', 'id');
    }
    

}
