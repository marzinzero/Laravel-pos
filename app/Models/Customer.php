<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'national_id',
        'phone',
        'email',
        'shopname',
        'photo',
        'address',
        'bank_name',
        'branch_name',
        'bank_account',
        'city',
    ];
}
