<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class DiaDiem extends Model
{
    protected $table = 'diadiem';
    
    public function BaiViet(): HasMany
    {
        return $this->hasMany(BaiViet::class, 'diadiem_id', 'id');
    }
}
