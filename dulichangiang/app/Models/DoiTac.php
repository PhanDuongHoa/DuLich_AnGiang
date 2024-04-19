<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DoiTac extends Model
{
    protected $table = 'doitac';
    
    public function BaiViet(): HasMany
    {
        return $this->hasMany(BaiViet::class, 'doitac_id', 'id');
    }
}
