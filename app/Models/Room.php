<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'discounted_price', 'available', 'category_id', 'photopath', 'status'];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
