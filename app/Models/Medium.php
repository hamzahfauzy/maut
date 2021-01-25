<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Medium
 *
 * @property $id
 * @property $name
 * @property $url
 * @property $scrap_url
 * @property $keywords
 * @property $status
 *
 * @property Log[] $logs
 * @property News[] $news
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Medium extends Model
{
    
    static $rules = [
		'name' => 'required',
		'url' => 'required',
		'scrap_url' => 'required',
		'keywords' => 'required',
		'status' => 'required',
    ];

    public $timestamps = false;
    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','url','scrap_url','keywords','status'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function logs()
    {
        return $this->hasMany('App\Models\Log', 'media_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function news()
    {
        return $this->hasMany('App\Models\News', 'media_id', 'id');
    }
    

}
