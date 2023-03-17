<?php

namespace App\Models;

use App\Models\projectDetaile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable=['name','image'];

    public function detaile()
    {
        return $this->hasOne(projectDetaile::class)->withDefault();
    }
}
