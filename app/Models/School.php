<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'rut',
        'region',
        'comuna',
        'address',
        'phone',
        'institution_id',
    ];
    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
