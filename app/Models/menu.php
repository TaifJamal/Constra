<?php

namespace App\Models;

use App\Models\Pricing;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class menu extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function service()
    {
        return $this->belongsTo(Service::class)->withDefault();
    }
    public function price()
    {
        return $this->belongsTo(Pricing::class)->withDefault();
    }

}
