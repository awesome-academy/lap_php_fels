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

    public function getOrderBy()
    {
        return $this->_model::orderBy('id', 'DESC')->paginate(config('number.ten'));
    }

    public function sync($test, array $data)
    {
        return $test->questions->sync($data);
    }

    public function detach($id)
    {
        $test = $this->find($id);
        if ($test) {
            $test->questions->detach();

            return true;
        }

        return false;
    }

}
