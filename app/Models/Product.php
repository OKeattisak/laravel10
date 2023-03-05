<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['name', 'code', 'category_id', 'unit_price', 'description'];

    public static $rules = [
        'name' => 'required',
        'code' => 'required|alpha_num|min:3|max:6|unique:products,code',
        'category_id' => 'required',
        'unit_price' => 'required|numeric',
    ];

    public static $messages = [
        'code.required' => 'The product code field is required.',
        'code.size' => 'The product code must be 6 characters.',
        'code.unique' => 'The product code has already been taken.',
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id'); //Category PK ID, Product FK ID
    }
}
