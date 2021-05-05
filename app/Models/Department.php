<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'department';
    public $timestamps = true;

    protected $fillable = [
        'department',
        'created_at'
    ];

    public function customer(){
        return $this->belongsToMany('App\Models\Customer')->withTimestamps();
    }
}
