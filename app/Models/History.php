<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'historys';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'count_old',
        'count_new',
    ];

    /**
     * Get the product associated with the history.
     */
    public function product()
    {
        return $this->hasOne(Category::class);
    }
}
