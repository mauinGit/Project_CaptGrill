<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseItem extends Model
{
    protected $fillable = [
        'expense_id',
        'employee_name', 'base_salary', 'bonus',
        'material_name', 'qty', 'price',
        'description', 'subtotal',
    ];

    public function expense()
    {
        return $this->belongsTo(Expense::class);
    }
}

