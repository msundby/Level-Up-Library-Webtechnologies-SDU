<?php

namespace App\Models;

use Database\Factories\GameFactory;
use Database\Factories\PlatformFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Platform extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected static function newFactory(): Factory
    {
        return PlatformFactory::new();
    }

    protected $table = "platforms";

    protected $primaryKey = 'platform_id';

//    protected $attributes = 'name';

}
