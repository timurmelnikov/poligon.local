<?php

namespace App\Observers;


use App\Models\BlogCategory;
use Illuminate\Support\Str;


class BlogCategoryObserver
{
    /**
     * Handle the models blog category "created" event.
     *
     * @param BlogCategory $blogCategory
     * @return void
     */
    public function created(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the models blog category "updated" event.
     *
     * @param BlogCategory $blogCategory
     * @return void
     */
    public function updated(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the models blog category "deleted" event.
     *
     * @param BlogCategory $blogCategory
     * @return void
     */
    public function deleted(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the models blog category "restored" event.
     *
     * @param BlogCategory $blogCategory
     * @return void
     */
    public function restored(BlogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the models blog category "force deleted" event.
     *
     * @param BlogCategory $blogCategory
     * @return void
     */
    public function forceDeleted(BlogCategory $blogCategory)
    {
        //
    }


    /**
     * Обработка перед изменением записи
     *
     * @param BlogCategory $blogCategory
     * @return void
     */
    public function updating(BlogCategory $blogCategory)
    {
        $this->setSlug($blogCategory);
    }


    /**
     * Обработка перед добавлением записи
     *
     * @param BlogCategory $blogCategory
     * @return  void
     */
    public function creating(BlogCategory $blogCategory)
    {
        $this->setSlug($blogCategory);
    }


    /**
     * Устанавливает Slug
     *
     * @param BlogCategory $blogCategory
     * @return void
     */
    protected function setSlug(BlogCategory $blogCategory)
    {
        if (empty($blogCategory->slug)) {
            $blogCategory->slug = Str::slug($blogCategory->title);
        }
    }
}
