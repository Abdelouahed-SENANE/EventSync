<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'date',
        'venue',
        'number_of_seats',
        'price',
        'validation_type',
        'user_id',
        'category_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class , 'category_id');
    }
        public function user() {
            return $this->belongsTo(User::class , 'user_id');
        }

}




