<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'created_at'
    ];

    public function department()
    {
        return $this->belongsToMany('App\Models\Department')->withTimestamps();
    }
}
