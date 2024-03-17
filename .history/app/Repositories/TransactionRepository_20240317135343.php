<?php namespace App\Repositories;

use App\Models\Currency;
use App\Models\Transaction;
use Illuminate\Container\Container;
use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Eloquent\Repository;

class TransactionRepository extends Repository
{
    protected $container;

    protected $model;

    public function __construct(Container $container)
    {
        $this->container = $container;
        $this->makeModel();
    }

    protected function makeModel()
    {
        $this->model = $this->container->make($this->model());
    }

    public function model()
    {
        return Transaction::class;
    }


    public function all()
    {
        //
    }

    public function find(string $id)
    {
        //
    }

    public function query(array $filters)
    {
        // TODO: Implement query() method.
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }
    
    public function save(array $data)
    {

    }

    public function update(string $id, array $data, $attribute = "")
    {
        
    }

    public function delete(string $id)
    {
        // TODO: Implement delete() method.
    }


}
