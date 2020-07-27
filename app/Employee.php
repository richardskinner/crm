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

        return $query
            ->orWhere('first_name', 'LIKE', "%{$term}%")
            ->orWhere('last_name', 'LIKE', "%{$term}%")
            ->orWhere('email', 'LIKE', "%{$term}%")
            ->orWhere('phone', 'LIKE', "%{$term}%")
            ->orWhereHas('company', function ($q) use($term) {
                $q->where('name', 'LIKE', "%{$term}%");
            });
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
