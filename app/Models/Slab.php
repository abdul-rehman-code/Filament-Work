<?php

namespace App\Models;

use App\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Model;

class Slab extends Model
{
    use LogsActivity;
    protected $fillable = [
        'slab_page_id',
        'year_range',
        'min_income',
        'max_income',
        'fixed_tax',
        'percentage_tax',
        'description',
    ];

    public function slabPage(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SlabPage::class);
    }
}
