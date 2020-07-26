<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'company_id',
        'first_name',
        'last_name',
        'email',
        'phone',
    ];

    public function scopeSearch($query, $term = null)
    {
        if (empty($term) || is_null($term)) {
            return $query;
        }

        return $query->orWhere('first_name', '=', $term)->orWhere('last_name', '=', $term);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
