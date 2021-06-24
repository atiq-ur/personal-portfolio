<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PortfolioImage extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =
        [
            'portfolio_id',
            'image'
        ];
    public function portfolio(){
        return $this->belongsTo(Portfolio::class, 'portfolio_id');
    }
}
