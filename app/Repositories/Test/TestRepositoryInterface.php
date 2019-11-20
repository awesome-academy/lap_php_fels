<?php
namespace App\Repositories\Test;

interface TestRepositoryInterface
{
    public function getModel();

    public function getOrderBy();

    public function getWhere($id);
}
