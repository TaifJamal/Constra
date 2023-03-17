<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Abilitiy extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function roles()
    {
       return $this->belongsToMany(Role::class);
    }
}
