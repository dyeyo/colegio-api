<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'rut',
        'region',
        'comuna',
        'address',
        'phone',
        'start_date',
        'created_by',
    ];
    public function schools()
    {
        return $this->hasMany(School::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
