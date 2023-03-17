<?php

namespace App\Models;

use App\Models\menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pricing extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function menus()
    {
        return $this->hasMany(menu::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class)->withDefault();
    }
}
