<?php


namespace App\Repositories;

use App\Models\BlogCategory as Model;


class BlogCategoryRepository extends CoreRepository
{

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    public function getEdit($id)
    {
        return $this->startConditions()->findOrFail($id);
    }

    public function getForComboBox()
    {
        return $this->startConditions()->all();
    }


}