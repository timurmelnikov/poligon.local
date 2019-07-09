<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogCategory
 *
 * @package App\Models
 *
 * @property-read BlogCategory $parentCategory
 * @property-read string $parentTitle
 */
class BlogCategory extends Model
{
    use SoftDeletes;

    /**
     * id корня.
     */
    const ROOT = 1;

    protected $fillable = [
        'parent_id',
        'slug',
        'title',
        'description',
    ];


    /**
     * Получить родительскую категорию
     *
     * @return BelongsTo
     */
    public function parentCategory()
    {
        return $this->belongsTo(Self::class, 'parent_id', 'id');
    }

    /**
     * Пример аксессуара (Accessor)
     *
     * @url https://laravel.com/docs/5.8/eloquent-mutators
     *
     * @return string
     */
    public function getParentTitleAttribute(){
        $title = $this->parentCategory->title
            ?? ($this->isRoot()
            ? 'Корень'
            : '???');
        return $title;
    }

    /**
     * Является ли текущий объект корнем
     *
     * @return bool
     */
    private function isRoot(){
        return $this->id === BlogCategory::ROOT;
    }


}
