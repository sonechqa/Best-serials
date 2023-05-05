<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Countries extends Model
{
    use HasFactory;
    protected $table = 'countries';
    protected $fillable = ['Name'];

    public function serials() {
        return $this->belongsToMany(Serials::class);
    }
}
