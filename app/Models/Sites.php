<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sites extends Model
{
    /** @use HasFactory<\Database\Factories\SitesFactory> */
    use HasFactory;
    use HasSoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['adress', 'city_id', 'email', 'phone'];

    /**
     * Get the city where the site is.
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Get the employess for the site.
     */
    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }
}
