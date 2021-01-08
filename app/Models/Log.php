<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Log
 *
 * @property $id
 * @property $media_id
 * @property $incoming_news
 * @property $stored_news
 * @property $created_at
 * @property $updated_at
 *
 * @property Medium $medium
 * @property News[] $news
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Log extends Model
{
    
    static $rules = [
		'media_id' => 'required',
		'incoming_news' => 'required',
		'stored_news' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['media_id','incoming_news','stored_news'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function medium()
    {
        return $this->hasOne('App\Models\Medium', 'id', 'media_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function news()
    {
        return $this->hasMany('App\Models\News', 'log_id', 'id');
    }
    

}
