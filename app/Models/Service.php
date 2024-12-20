<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $guarded = [];

    public function descriptions()
    {
        return $this->hasMany(ServiceDescription::class, 'service_id');
    }
}
