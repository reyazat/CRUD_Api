<?php
namespace App\Repositories;

use App\Models\Customer;
use App\Repositories\CustomerInterface;


class CustomerRepository implements CustomerInterface
{
   public function getAll()
    {
        return Customer::orderByDesc('id')->get();
    }

    public function find(Customer $Customer)
    {
        return $Customer->findOrFail();
    }

    public function store(array $data)
    {
        $store = new Customer();
        $store->firstname = $data['firstname'];
        $store->lastname = $data['lastname'];
        $store->date_of_birth = $data['date_of_birth'];
        $store->phonenumber = $data['phonenumber'];
        $store->email = $data['email'];
        $store->bank_account = $data['bank_account'];
        $store->save();

        return $store;
    }

    public function update($data, $update)
    {
        $update->firstname = $data['firstname'];
        $update->lastname = $data['lastname'];
        $update->date_of_birth = $data['date_of_birth'];
        $update->phonenumber = $data['phonenumber'];
        $update->email = $data['email'];
        $update->bank_account = $data['bank_account'];
        $update->save();

        return $update;
    }

    public function delete(Customer $Customer)
    {
        return $Customer->delete();
    }
}