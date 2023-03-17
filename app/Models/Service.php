<?php

namespace App\Models;

use App\Models\menu;
use App\Models\Pricing;
use App\Models\Question;
use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function menus()
    {
        return $this->hasMany(menu::class);
    }
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function price()
    {
        return $this->hasOne(Pricing::class);
    }
}
