<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    use HasFactory;
    public function scopeMaterial($query, $request)
    {
        if ($request->has('material')) {
            if($request->material !== "all"){
                $query->where('material', $request->material);
            }
        }
        if ($request->has('category')) {
            if($request->category !== ""){
                $query->where('category', $request->category);
        }
    }
        if ($request->has('brand_id')) {
            if($request->brand_id !== ""){
            $query->where('brand_id', $request->brand_id);
            }
        }
        if ($request->has('name')) {
            if($request->name !== ""){
            $query->where('name', 'like', '%' . $request->name . '%');
            }
        }
        return $query;
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    protected $fillable = [
        'name',
        'price',
        'discount',
        'image',
        'size',
        'material',
        'color',
        'category',
        'brand_id',       
    ];
}
