<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Alternatif
 *
 * @property $id
 * @property $name
 * @property $NIK
 * @property $tempat_lahir
 * @property $tanggal_lahir
 * @property $pendidikan_terakhir
 * @property $no_sk_pertama
 * @property $tanggal_sk_pertama
 * @property $no_sk_terakhir
 * @property $tanggal_sk_terakhir
 * @property $jenis_jabatan
 * @property $alamat
 *
 * @property Valuation[] $valuations
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Alternatif extends Model
{
    
    static $rules = [
		'name' => 'required',
		'NIK' => 'required',
		'jenis_kelamin' => 'required',
		'unit_kerja' => 'required',
		'tempat_lahir' => 'required',
		'tanggal_lahir' => 'required',
    ];

    protected $perPage = 20;

    public $timestamps = false;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','NIK','jenis_kelamin','unit_kerja','tempat_lahir','tanggal_lahir','pendidikan_terakhir','no_sk_pertama','tanggal_sk_pertama','no_sk_terakhir','tanggal_sk_terakhir','jenis_jabatan','alamat'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function valuations()
    {
        return $this->hasMany('App\Models\Valuation', 'alternatif_id', 'id');
    }
    

}
