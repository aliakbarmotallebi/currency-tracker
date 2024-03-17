<?php namespace App\Repositories;

use App\Managers\CurrencyManagement\CurrencyManager;
use App\Models\Currency;
use Illuminate\Container\Container;
use App\Repositories\Contracts\RepositoryInterface;
use App\Repositories\Eloquent\Repository;
use Illuminate\Support\Facades\DB;

class CurrencyRepository extends Repository
{
    protected $container;

    protected $model;

    private $currencyManager;

    public function __construct(
        Container $container,
        CurrencyManager $currencyManager)
    {
        $this->container = $container;
        $this->currencyManager = $currencyManager;
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

    public function findWithAverageWeightedRate(
        Currency $currency)
    {
       return $this->currencyManager->calculateWeightedAverage(
        $currency->transactions()->pluck('amount')->toArray(), 
        $currency->transactions()->pluck('exchange_rate')->toArray());
    }

    public function find(string $id)
    {
        return $this->model->find($id);
    }

    public function query(array $filters)
    {
        // TODO: Implement query() method.
    }

    public function create(array $data)
    {
       
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
