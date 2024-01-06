<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $primaryKey = "id";
    protected $fillable = ['Name', 'Description','CategoryID','Img'];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'CategoryID');
    }
}
