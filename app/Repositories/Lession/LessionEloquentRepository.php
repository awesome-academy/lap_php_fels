<?php
namespace App\Repositories\Lession;

use App\Repositories\EloquentRepository;
use App\Models\Lession;

class LessionEloquentRepository extends EloquentRepository implements LessionRepositoryInterface
{

    public function getModel()
    {
        return Lession::class;
    }

    public function getOrderBy()
    {
        return $this->_model::orderBy('id', 'DESC')->paginate(config('number.ten'));
    }

}
