<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Folders extends Model
{
    use HasFactory;
    protected $table = 'folders';
    protected $fillable = ['Name', 'user_id'];
    public $timestamps = false;

    public function serials() {
        return $this->belongsToMany(Serials::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
