<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Criteria
 *
 * @property $id
 * @property $name
 * @property $weighted
 *
 * @property Subcriteria[] $subcriterias
 * @property Valuation[] $valuations
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Criteria extends Model
{
    
    static $rules = [
		'name' => 'required',
		'weighted' => 'required',
    ];

    public $timestamps = false;

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','weighted'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subcriterias()
    {
        return $this->hasMany('App\Models\Subcriteria', 'criteria_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function valuations()
    {
        return $this->hasMany('App\Models\Valuation', 'criteria_id', 'id');
    }
    

}
