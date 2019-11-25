<?php
namespace App\Repositories\Test;

interface TestRepositoryInterface
{
    public function getModel();

    public function getOrderBy();

    public function sync($id, array $data);

    public function detach($id);
}
