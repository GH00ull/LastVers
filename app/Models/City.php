<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    protected $guarded = [];
    public function ads()
    {
        return $this->hasMany(Ads::class, 'id_city');
    }
}