<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Outlet extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = ['id'];

    public function businessCategory(): BelongsTo
    {
        return $this->belongsTo(BusinessCategory::class,'id_business_category');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'id_outlet');
    }
}
