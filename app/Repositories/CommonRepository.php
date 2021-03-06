<?php
namespace App\Repositories;

use App\Traits\BaseRepositoryTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Factory;
class CommonRepository
{

    use BaseRepositoryTrait;

    protected $model;

    protected $validator;

    public function __construct(Model $model, Factory $validator)
    {
        $this->model = $model;
        $this->validator = $validator;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getValidator()
    {
        return $this->validator;
    }
}
