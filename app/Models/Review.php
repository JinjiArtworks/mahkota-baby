<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'ulasans';

    public function users()
    {
        return $this->hasOne(User::class);
    }
    public function products()
    {
        return $this->hasOne(Product::class);
    }
}
