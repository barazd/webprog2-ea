<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Observers\CityObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy([CityObserver::class])]
class City extends Model
{
    /** @use HasFactory<\Database\Factories\CitiesFactory> */
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'country_code', 'postal_code'];

    /**
     * Get the sites for the city.
     */
    public function sites(): HasMany
    {
        return $this->hasMany(Site::class);
    }
}
