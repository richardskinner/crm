<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'email',
        'logo',
        'website'
    ];

    public function scopeSearch($query, $term)
    {
        if (empty($term) || is_null($term)) {
            return $query;
        }

        return $query
            ->orWhere('name', 'LIKE', "%{$term}%")
            ->orWhere('email', 'LIKE', "%{$term}%")
            ->orWhere('website', 'LIKE', "%{$term}%");
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
