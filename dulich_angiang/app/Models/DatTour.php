<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DatTour extends Model
{
    use HasFactory;

    protected $table = 'dattour';

    /**
     * Get the tour that belongs to the booking.
     */
    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    /**
     * Get the user that belongs to the booking.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
