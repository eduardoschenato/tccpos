<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SectionImage;

class Section extends Model
{
    use HasFactory;

    public function images() {
        return $this->hasMany(SectionImage::class);
    }
}
