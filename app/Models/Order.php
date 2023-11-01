<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;
    
    protected $guarded=[];

    public function orderable()
    {
      return $this->morphTo();
    }
    public function watch():BelongsTo
    {
      return $this->belongsTo(Watch::class);
    }
}
