<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable =
        [
            'category_id',
            'client_name',
            'project_date',
            'project_url',
            'project_title',
            'project_desc',
        ];
    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function portfolioImages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PortfolioImage::class, 'portfolio_id');
    }

}
