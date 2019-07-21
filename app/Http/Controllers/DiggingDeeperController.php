<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Carbon\Carbon;
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

//        dd(
////            get_class($eloquentCollection),
////            get_class($collection),
////            $collection
////        );

//        $result['first'] = $collection->first();
//        $result['last'] = $collection->last();

        //dd($result);

        // Выборка
//        $result['where']['data'] = $collection
//            ->where('category_id', '=', 10)
//            ->values()
//            ->keyBy('id');

        //dd($result);

//        $result['where']['count'] = $result['where']['data']->count();
//        $result['where']['isEmpty'] = $result['where']['data']->isEmpty();
//        $result['where']['isNotEmpty'] = $result['where']['data']->isNotEmpty();
//
//
//        $result['first_where'] = $collection->firstWhere('created_at', '>' ,'2019-01-17 01:35:00');


        //Мутируем в другой формат
//        $result['map']['all'] = $collection->map(function (array $item){
//            $newItem = new \stdClass();
//            $newItem->item_id = $item['id'];
//            $newItem->item_name = $item['title'];
//            $newItem->exists = is_null($item['deleted_at']);
//            $newItem->xxx = 'yyy';
//            return $newItem;
//        });

//        $result['map']['not_exist'] = $result['map']['all']
//            ->where('exists', '=', false)
//        ->values()
//        ->keyBy('item_id');

        //dd($result);


        //Мутируем в другой формат саму коллекцию
        $collection->transform(function (array $item){
            $newItem = new \stdClass();
            $newItem->item_id = $item['id'];
            $newItem->item_name = $item['title'];
            $newItem->exists = is_null($item['deleted_at']);
            $newItem->created_at = Carbon::parse($item['created_at']);
            $newItem->xxx = 'yyy';
            return $newItem;
        });

        //dd($collection);
//        $newItem = new \stdClass();
//        $newItem->id = 9999;
//
//        $newItem2 = new \stdClass();
//        $newItem2->id=7777;

        //dd($newItem, $newItem2);

        //$collection->prepend($newItem);
        //$collection->push($newItem2);
        //dd( $collection);

        //Установить элемент в начало коллекции
//        $newItemFirst = $collection->prepend($newItem)->first();
//        $newItemLast = $collection->push($newItem2)->last();
//        $pulledItem = $collection->pull(5);
//
//        dd(compact('collection', 'newItemFirst', 'newItemLast', 'pulledItem' ));

        //Фильтрация
//        $filtred = $collection->filter(function ($item){
//            $byDay = $item->created_at->isFriday();
//            $byDate = $item->created_at->day == 5;
//
//            $result = $byDay && $byDate;
//
//            return $result;
//        });
//
//        dd(compact('filtred'));

        $sortedSimpleCollection = collect([1,2,5,4,3,6]);
        $sortedAscCollection = $collection->sortBy('created_at')->sort()->values();
        $sortedDescCollection = $collection->sortByDesc('created_at');

        dd(compact('sortedSimpleCollection','sortedAscCollection','sortedDescCollection'));


    }

}
