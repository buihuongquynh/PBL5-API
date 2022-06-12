<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public function scopeRole($query, $request)
{
    if ($request->has('role')) {
        if($request->role !== "all"){
            $query->where('role', $request->role);
        }
    }
    return $query;
}
    protected $fillable = [
        'name',
        'email',
        'date_of_birth',
        'gender',
        'phone_number',
        'address',
        'password',
        'role',
    ];
}
