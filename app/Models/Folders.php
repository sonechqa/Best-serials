<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Folders extends Model
{
    use HasFactory;
    protected $table = 'folders';
    protected $fillable = ['Name'];
    public $timestamps = false;

    public function serials() {
        return $this->belongsToMany(Serials::class);
    }
}
