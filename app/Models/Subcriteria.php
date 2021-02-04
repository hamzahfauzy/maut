<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Subcriteria
 *
 * @property $id
 * @property $criteria_id
 * @property $name
 * @property $weighted
 *
 * @property Criteria $criteria
 * @property Valuation[] $valuations
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Subcriteria extends Model
{
    
    static $rules = [
		'criteria_id' => 'required',
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
    protected $fillable = ['criteria_id','name','weighted'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function criteria()
    {
        return $this->hasOne('App\Models\Criteria', 'id', 'criteria_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function valuations()
    {
        return $this->hasMany('App\Models\Valuation', 'subcriteria_id', 'id');
    }
    

}
