<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DoiTac extends Model
{
    use HasFactory;
    
    protected $table = 'doitac';

    /**
     * Get the tours for the partner.
     */
    public function tour()
    {
        return $this->hasMany(Tour::class);
    }
}
