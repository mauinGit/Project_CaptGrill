<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = ['date', 'category', 'total_amount', 'notes', 'created_by'];

    public function items()
    {
        return $this->hasMany(ExpenseItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

