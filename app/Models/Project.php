<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'lead_id',
        'description',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }
}
