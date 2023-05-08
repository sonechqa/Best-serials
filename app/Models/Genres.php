<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genres extends Model
{
    use HasFactory;
    protected $table = 'genres';
    protected $fillable = ['Name'];
    public $timestamps = false;

    public function serials() {
        return $this->belongsToMany(Serials::class);
    }
}
