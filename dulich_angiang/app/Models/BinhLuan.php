<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BinhLuan extends Model
{
    use HasFactory;

    protected $table = 'binhluan';

    /**
     * Get the tour that the comment belongs to.
     */
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    /**
     * Get the user who made the comment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
