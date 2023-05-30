<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Serials extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'serials';
    protected $fillable = ['Name', 'Description', 'Directors', 'Rating', 'ReleaseYears', 'Poster'];

    public function genres() {
        return $this->belongsToMany(Genres::class);
    }

    public function countries() {
        return $this->belongsToMany(Countries::class);
    }

    public function folders() {
        return $this->belongsToMany(Folders::class);
    }
}
