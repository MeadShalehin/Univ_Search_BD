<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;


    public function image() {
        return $this->morphOne(Image::class, 'parentable');
    }

    public function images() {
        return $this->morphMany(Image::class, 'parentable');
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    public function departments()
    {
        return $this->hasMany(Department::class);
    }
}
