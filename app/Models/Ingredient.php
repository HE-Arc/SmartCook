<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Recipe;

class Ingredient extends Model
{
    use HasFactory;

    protected $table = 'ingredients';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'name', 'category', 'measure'
    ];

    public function recipes() {
        return $this -> belongsToMany(Recipe::class)
             ->withPivot('quantity');
    }

}
