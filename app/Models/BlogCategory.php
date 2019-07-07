<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BlogCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'parent_id',
        'slug',
        'title',
        'description',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentCategory()
    {
        // Категория принадлежит родительской категории.
        return $this->belongsTo(Self::class, 'parent_id', 'id');
    }


}
