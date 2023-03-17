<?php

namespace App\Models;

use App\Models\Abilitiy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function abilities()
    {
       return $this->belongsToMany(Abilitiy::class);
    }
}
