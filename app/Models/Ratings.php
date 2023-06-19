<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ratings extends Model
{
    use HasFactory;
    protected $table = 'ratings';
    protected $fillable = ['rating'];
    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function serial() {
        return $this->belongsTo(Serials::class);
    }
}
