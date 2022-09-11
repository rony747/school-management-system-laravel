<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeAmount extends Model
{
    use HasFactory;

    protected $table = 'fee_amounts';
    protected $fillable = [
        'fee_category_id',
        'class_id',
        'amount',
    ];

    public function classes()
    {
        return $this->belongsTo(StudentClass::class, 'class_id', 'id');
    }

    public function feeCategory()
    {
        return $this->belongsTo(FeeCategory::class, 'fee_category_id', 'id');
    }
}
