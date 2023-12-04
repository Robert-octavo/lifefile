<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;



    public static array $departmentNames = [
        'Accounting',
        'Administration',
        'Customer Service',
        'Engineering',
        'Finance',
        'Human Resources',
        'Information Technology',
        'Legal',
        'Marketing',
        'Production',
        'Quality Assurance',
        'Research and Development',
        'Sales',
        'Training',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
