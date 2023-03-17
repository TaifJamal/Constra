<?php

namespace App\Models;

use App\Models\Service;
use App\Models\projectDetaile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function service()
    {
        return $this->belongsTo(Service::class)->withDefault();
    }

    public function detaile()
    {
        return $this->belongsTo(projectDetaile::class)->withDefault();
    }
}
