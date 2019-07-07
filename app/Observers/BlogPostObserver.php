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
     * @param  BlogPost  $blogPost
     * @return void
     */
    public function created(BlogPost  $blogPost)
    {
        //
    }

    /**
     * Handle the models blog post "updated" event.
     *
     * @param  BlogPost  $blogPost
     * @return void
     */
    public function updated(BlogPost  $blogPost)
    {
        //
    }

    /**
     * Handle the models blog post "deleted" event.
     *
     * @param  BlogPost  $blogPost
     * @return void
     */
    public function deleted(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the models blog post "restored" event.
     *
     * @param  BlogPost  $blogPost
     * @return void
     */
    public function restored(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the models blog post "force deleted" event.
     *
     * @param  BlogPost  $blogPost
     * @return void
     */
    public function forceDeleted(BlogPost  $blogPost)
    {
        //
    }

    /**
     * Обработка перед изменением записи
     *
     * @param  BlogPost  $blogPost
     * @return void
     */
    public function updating(BlogPost  $blogPost){

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
     * Устанавливает дату публикации
     *
     * @param  BlogPost  $blogPost
     * @return void
     */
    protected function setPublishedAt(BlogPost  $blogPost){

        $needSetPublished = empty($blogPost->published_at) && $blogPost['is_published'];
        if($needSetPublished){
            $blogPost['published_at'] = Carbon::now();
        }
    }


    /**
     * Устанавливает Slug
     *
     * @param  BlogPost  $blogPost
     * @return void
     */
    protected function setSlug(BlogPost  $blogPost){
        if(empty($blogPost['slug'])){
            $blogPost['slug'] = Str::slug($blogPost['title']);
        }
    }
}
