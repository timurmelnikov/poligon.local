<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $paginator = BlogCategory::paginate(15);
        //dd($paginator);
        return view('blog.admin.categories.index', compact('paginator'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        dd(__METHOD__);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        dd(__METHOD__);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $item = BlogCategory::findOrFail($id);

        $categoryList = BlogCategory::all();

        return view('blog.admin.categories.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required|min:5|max:200',
            'slug' => 'max:200',
            'description' => 'string|max:500|min:3',
            'parent_id' => 'required|integer|exists:blog_categories,id',
        ];

        //$validatedData = $this->validate($request, $rules);

        //$validatedData = $request->validate($rules);

//        $validator = \Validator::make($request->all(), $rules);
//        $validatedData[] = $validator->passes();
//        $validatedData[] = $validator->validate();
//        $validatedData[] = $validator->valid();
//        $validatedData[] = $validator->failed();
//        $validatedData[] = $validator->errors();
//        $validatedData[] = $validator->fails();

          //dd($validatedData);

        $item = BlogCategory::find($id);

        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();
        $result = $item->fill($data)->save();

        if ($result) {
            return redirect()
                ->route('blog.admin.categories.edit', $id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохраенения'])
                ->withInput();
        }


    }


}
