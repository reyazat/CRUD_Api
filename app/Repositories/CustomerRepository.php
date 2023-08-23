<?php
namespace App\Repositories;

use App\Models\Customer;
use App\Repositories\CustomerInterface;


class CustomerRepository implements CustomerInterface
{
   public function getAll()
    {
        return Customer::all();
    }

    public function find(Customer $Customer)
    {
        return $Customer->findOrFail();
    }

    public function delete(Customer $Customer)
    {
        return $Customer->delete();
    }
}