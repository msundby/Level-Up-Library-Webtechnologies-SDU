<?php

namespace App\Models;

use Database\Factories\StudioFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Studio extends Model
{
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return StudioFactory::new();
    }

    public function games(): BelongsToMany {
        return $this->belongsToMany(Game::class);
    }

    protected $table = "studios";

    protected $primaryKey = 'studio_id';

//    protected $attributes = 'name';
}
