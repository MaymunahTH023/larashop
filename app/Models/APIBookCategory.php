<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APIBookCategory extends Model
{
    protected $table = 'book_category';
    protected $fillable = [
        'book_id', 'category_id', 'invoice_number', 'status'
    ];
}