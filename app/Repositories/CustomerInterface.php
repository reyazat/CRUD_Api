<?php
namespace App\Repositories;

interface CustomerInterface {

    public function getAll();

    public function find($id);

    public function delete($id);
}