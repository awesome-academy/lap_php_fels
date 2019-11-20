<?php
namespace App\Repositories\Course;

use App\Repositories\EloquentRepository;
use App\Models\Course;

class CourseEloquentRepository extends EloquentRepository implements CourseRepositoryInterface
{

    public function getModel()
    {
        return Course::class;
    }

    public function getOrderBy()
    {
        return $this->_model::orderBy('id', 'DESC')->paginate(config('number.ten'));
    }
}
