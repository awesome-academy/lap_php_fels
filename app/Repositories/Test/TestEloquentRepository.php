<?php
namespace App\Repositories\Test;

use App\Repositories\EloquentRepository;
use App\Models\Test;

class TestEloquentRepository extends EloquentRepository implements TestRepositoryInterface
{

    public function getModel()
    {
        return Test::class;
    }

    public function getWhere($id)
    {
        return $this->_model::where('lession_id', $id)->get();
    }

    public function getOrderBy()
    {
        return $this->_model::orderBy('id', 'DESC')->paginate(config('number.ten'));
    }

}
