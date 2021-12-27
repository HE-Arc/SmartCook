<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ingredient;

class Recipe extends Model
{
    use HasFactory;

    protected $table = 'recipes';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'name', 'persons', 'description', 'instruction', 'cook_time', 'category'
    ];

    public function ingredients() {
        return $this -> belongsToMany(Ingredient::class)
             ->withPivot('quantity');
    }
}
