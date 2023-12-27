<?php

namespace App\Models;

use Database\Factories\GameFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return GameFactory::new();
    }

    public function review(): HasMany {
        return $this->hasMany(Review::class);
    }

//    public function studios(): BelongsToMany {
//        return $this->belongsToMany(Studio::class);
//    }

//    public function platforms(): BelongsToMany {
//        return $this->belongsToMany(Platform::class);
//    }

    protected $fillable = [
        'name',
        'description',
        'image_link',
        'release_date',
        'aggregate_rating'
    ];

    protected $table = "games";

    protected $primaryKey = 'game_id';

    protected $attributes = [
        //Deleted this - it is used for creating an instance of an entity and has to be defined explicitly only for a single entity object.
        //Don't know if we need it right now. Confused the Factory by trying to insert values from 0-3 in the array of Database when creating dummy objects.
    ];

}
