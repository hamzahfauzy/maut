<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Valuation
 *
 * @property $id
 * @property $criteria_id
 * @property $subcriteria_id
 * @property $alternatif_id
 *
 * @property Alternatif $alternatif
 * @property Criteria $criteria
 * @property Subcriteria $subcriteria
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Valuation extends Model
{
    
    static $rules = [
		// 'criteria_id' => 'required',
		'subcriteria_id.*' => 'required',
		'alternatif_id' => 'required',
    ];

    public $timestamps = false;

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['criteria_id','subcriteria_id','alternatif_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function alternatif()
    {
        return $this->hasOne('App\Models\Alternatif', 'id', 'alternatif_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function criteria()
    {
        return $this->hasOne('App\Models\Criteria', 'id', 'criteria_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function subcriteria()
    {
        return $this->hasOne('App\Models\Subcriteria', 'id', 'subcriteria_id');
    }
    

}
