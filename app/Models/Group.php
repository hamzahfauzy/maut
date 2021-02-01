<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Group
 *
 * @property $id
 * @property $color
 * @property $name
 * @property $slug
 * @property $status
 *
 * @property Category[] $categories
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Group extends Model
{
  public $timestamps = false;
    
  static $rules = [
		'color' => 'required',
		'name' => 'required',
		'slug' => 'required',
		'status' => 'required',
  ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['color','name','slug','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->hasMany('App\Models\Category', 'group_id', 'id');
    }
    

}
