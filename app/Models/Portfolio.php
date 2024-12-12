<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolios';
    protected $guarded = [];

    public function images()
    {
        return $this->hasMany(PortfolioImage::class);
    }
}
