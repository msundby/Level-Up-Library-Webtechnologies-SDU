<?php

namespace App\Models;

use Database\Factories\GameFactory;
use Database\Factories\ReviewFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Review extends Model
{
    use HasFactory;

    protected static function newFactory(): Factory
    {
        return ReviewFactory::new();
    }

    protected $table = "reviews";

    protected $primaryKey = 'review_id';

    public function game(): BelongsTo {
        {
            return $this->belongsTo(Game::class, 'game_id', 'game_id');
        }
    }

    public function user(): BelongsTo {
        {
            return $this->belongsTo(User::class, 'user_id', 'user_id');
        }
    }

//    protected $attributes = [
//        'rating',
//        'description'
//    ];
//
//    protected $casts = [
//        'review_created_on' => 'datetime',
//        'last_edited' => 'datetime',
//    ];

}
