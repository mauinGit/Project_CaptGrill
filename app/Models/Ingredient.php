<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingredient extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'name',
        'stock',
        'unit',
        'reorder_level',
    ];

    // 👇 Tambahkan ini agar Filament tahu kolom judul
    protected static ?string $recordTitleAttribute = 'name';

    public function menuItems()
    {
        return $this->belongsToMany(MenuItem::class, 'menu_ingredients')
            ->withPivot(['ingredient_id', 'quantity_used', 'unit'])
            ->withTimestamps();
    }
}
