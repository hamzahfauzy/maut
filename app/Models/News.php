<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class News
 *
 * @property $id
 * @property $log_id
 * @property $category_id
 * @property $village_id
 * @property $district_id
 * @property $media_id
 * @property $title
 * @property $description
 * @property $location
 * @property $origin_url
 * @property $event_date
 * @property $lat
 * @property $long
 * @property $created_by
 * @property $updated_by
 * @property $created_at
 * @property $updated_at
 *
 * @property Category $category
 * @property District $district
 * @property Log $log
 * @property Medium $medium
 * @property Village $village
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class News extends Model
{
    
    static $rules = [
		'title' => 'required',
		'description' => 'required',
		'event_date' => 'required',
		'created_by' => 'required',
		'updated_by' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['log_id','category_id','village_id','district_id','media_id','title','description','location','origin_url','event_date','lat','long','created_by','updated_by'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function district()
    {
        return $this->hasOne('App\Models\District', 'id', 'district_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function log()
    {
        return $this->hasOne('App\Models\Log', 'id', 'log_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function medium()
    {
        return $this->hasOne('App\Models\Medium', 'id', 'media_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function village()
    {
        return $this->hasOne('App\Models\Village', 'id', 'village_id');
    }
    

}
