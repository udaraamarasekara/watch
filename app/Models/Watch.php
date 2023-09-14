<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Watch extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function coverimage():HasOne
    {
      return $this->hasOne(WatchCoverImage::class);
    }

    public function images():HasMany
    {
      return $this->hasMany(WatchImage::class);
    }
}
