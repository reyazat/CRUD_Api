<?php
namespace App\Repositories;
use App\Models\Customer;

interface CustomerInterface {

    public function getAll();

    public function find(Customer $Customer);

    public function delete(Customer $Customer);
}