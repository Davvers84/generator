<?php

namespace App\Repositories;

use Illuminate\Http\Request;

/**
 * Class BaseRepository
 * @package App\Repositories
 */
abstract class BaseRepository
{
    /**
     * @var
     */
    private $model;

    /**
     * BaseRepository constructor.
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param $request
     * @return mixed
     */
    public function create(Request $request)
    {
        return $this->model->create($request);
    }

    /**
     * @param $id
     * @param $request
     * @return mixed
     */
    public function update($id, $request)
    {
        return $this->model->find($id)->update($request);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}