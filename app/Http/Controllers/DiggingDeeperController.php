<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;


/**
 * Базовая информация:
 * @url https://laravel.com/docs/5.8/collections
 *
 * Справочная информация:
 * @url https://laravel.com/api/5.8/Illuminate/Support/Collection.html
 *
 * Вариант коллекций для моделей eloquent:
 * @url https://laravel.com/api/5.8/Illuminate/Database/Eloquent/Collection.html
 *
 * Билдер запросов - то с чем можно перепутать коллекции:
 * @url https://laravel.com/docs/5.8/queries
 *
 * Class DiggingDeeperController
 * @package App\Http\Controllers
 */
class DiggingDeeperController extends Controller
{

    public function collections()
    {
        $result=[];

        /**
         * @var /Illuminate/Database/Eloquent/Collection $eloquentCollection
         */
        $eloquentCollection = BlogPost::withTrashed()->get();

        //dd(__METHOD__, $eloquentCollection, $eloquentCollection->toArray());


        /**
         * @var /Illuminate/Support/Collection $collection
         */
        $collection = collect($eloquentCollection->toArray());

        dd(
            get_class($eloquentCollection),
            get_class($collection),
            $collection
        );


    }

}
