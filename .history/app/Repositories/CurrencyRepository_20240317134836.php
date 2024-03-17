<?php namespace App\Repositories;

use App\Models\Currency;
use Illuminate\Container\Container;
use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Eloquent\Repository;
use DB;

class CurrencyRepository extends Repository
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
        return Currency::class;
    }

    public function confirmedCurrencyList()
    {
       return $this->model->available()->get();
    }

    public function all()
    {
        return $this->model->get();
    }

    public function findWithAverageWeightedRate(Currency $currency)
    {
        return $this->model->withCount(['transactions as average_exchange_rate' => function($query) {
                    $query->select(DB::raw('AVG(exchange_rate)'));
        }])->where('currencies.id', $currency->id)->first();
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
