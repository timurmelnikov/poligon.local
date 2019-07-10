<?php

namespace App\Observers;

use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BlogPostObserver
{
    /**
     * Handle the models blog post "created" event.
     *
     * @param BlogPost $blogPost
     * @return void
     */
    public function created(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the models blog post "updated" event.
     *
     * @param BlogPost $blogPost
     * @return void
     */
    public function updated(BlogPost $blogPost)
    {
        //
    }


    /**
     * Перед удалением
     *
     * @param BlogPost $blogPost
     */
    public function deleting(BlogPost $blogPost)
    {
        //dd(__METHOD__, $blogPost);
        //return false;
    }


    /**
     * Handle the models blog post "deleted" event.
     *
     * @param BlogPost $blogPost
     * @return void
     */
    public function deleted(BlogPost $blogPost)
    {
        //dd(__METHOD__, $blogPost);
    }

    /**
     * Handle the models blog post "restored" event.
     *
     * @param BlogPost $blogPost
     * @return void
     */
    public function restored(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the models blog post "force deleted" event.
     *
     * @param BlogPost $blogPost
     * @return void
     */
    public function forceDeleted(BlogPost $blogPost)
    {
        //
    }

    /**
     * Обработка перед изменением записи
     *
     * @param BlogPost $blogPost
     * @return void
     */
    public function updating(BlogPost $blogPost)
    {

//        $test[] = $blogPost->isDirty();
//        $test[] = $blogPost->isDirty('is_published');
//        $test[] = $blogPost->isDirty('user_id');
//        $test[] = $blogPost->getAttribute('is_published');
//        $test[] = $blogPost->is_published;
//        $test[] = $blogPost->getOriginal('is_published');
//        dd($test);

        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);

    }


    /**
     * Обработка перед вставкой записи
     *
     * @param BlogPost $blogPost
     * @return void
     */
    public function creating(BlogPost $blogPost)
    {
        $this->setPublishedAt($blogPost);
        $this->setSlug($blogPost);
        $this->setHtml($blogPost);
        $this->setUser($blogPost);
    }


    /**
     * Устанавливает дату публикации
     *
     * @param BlogPost $blogPost
     * @return void
     */
    protected function setPublishedAt(BlogPost $blogPost)
    {
        $needSetPublished = empty($blogPost->published_at) && $blogPost['is_published'];
        if ($needSetPublished) {
            $blogPost['published_at'] = Carbon::now();
        }
    }


    /**
     * Устанавливает Slug
     *
     * @param BlogPost $blogPost
     * @return void
     */
    protected function setSlug(BlogPost $blogPost)
    {
        if (empty($blogPost['slug'])) {
            $blogPost['slug'] = Str::slug($blogPost['title']);
        }
    }


    /**
     * Устанавливает content_html
     *
     * @param BlogPost $blogPost
     * @return void
     */
    protected function setHtml(BlogPost $blogPost)
    {
        if ($blogPost->isDirty('content_raw')) {
            // TODO Тут будет генерация HTML markdown > html
            $blogPost->content_html = $blogPost->content_raw;
        }
    }

    /**
     * Устанавливает user_id. Если не указан - то пользователь по умолчанию
     *
     * @param BlogPost $blogPost
     * @return void
     */
    protected function setUser(BlogPost $blogPost)
    {
        $blogPost->user_id = auth()->id() ?? BlogPost::UNKNOWN_USER;
    }

}
