<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'image', 'categories_id', 'hospitals_id'
    ];

    public function category()
    {
        return $this->belongsTo(DoctorCategory::class, 'categories_id', 'id');
    }

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospitals_id', 'id');
    }
}
