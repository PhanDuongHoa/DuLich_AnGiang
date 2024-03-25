<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tour extends Model
{
    use HasFactory;

        protected $table = 'tour';

    /**
     * Get the partner that owns the tour.
     */
    public function doitac()
    {
        return $this->belongsTo(DoiTac::class);
    }

    /**
     * Get the bookings for the tour.
     */
    public function dattour()
    {
        return $this->hasMany(DatTour::class);
    }

    /**
     * Get the comments for the tour.
     */
    public function binhluan()
    {
        return $this->hasMany(BinhLuan::class);
    }
}