<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Alternatif
 *
 * @property $id
 * @property $name
 *
 * @property Valuation[] $valuations
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Alternatif extends Model
{
    
    static $rules = [
		'name' => 'required',
    ];

    public $timestamps = false;

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function valuations()
    {
        return $this->hasMany('App\Models\Valuation', 'alternatif_id', 'id');
    }
    

}
