<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;
    // protected $casts = [
    //     'photo' => 'array'
    // ];
    protected $fillable = [];
    protected $guarded = [];
    public function setImagesAttribute($value)
    {
        $this->attributes['images'] = json_encode($value);
    }

    public function getImagesAttribute($value)
    {
        return json_decode($value, true);
    }
    public function city()
    {
        return $this->belongsTo(City::class, 'id_city');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'id_brand');
    }
}