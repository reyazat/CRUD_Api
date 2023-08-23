<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Repositories\CustomerRepository;

class CustomerController extends Controller
{
    protected $repository;
    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

      /**
     * @OA\Put(
     * path="/api/v1/customers",
     * tags={"Customer"},
     * summary="گرفتن کل داده های مشتری ها",
     * description="گرفتن کل داده های مشتری ها",
     * security={ {"sanctum": {} }},
     *    @OA\Parameter(
     *          description="application/json;",
     *          in="header",
     *          name="Accept",
     *          required=true,
     *          @OA\Schema(type="string"),
     *      ),
     *
     *     @OA\Response(
     *          response=200,
     *          description="گرفتن کل داده های مشتری ها",
     *          @OA\JsonContent(
     *             @OA\Examples(
     *                summary="گرفتن کل داده های مشتری ها",
     *                example ="گرفتن کل داده های مشتری ها",
     *                value = {"status":"success","code":200,"message":"Successfully logged out","errors":{},"data":{}}
     *              )
     *          )
     *       ),
     *    @OA\Response(
     *          response=401,
     *          description="گرفتن کل داده های مشتری ها",
     *          @OA\JsonContent(
     *             @OA\Examples(
     *                summary="گرفتن کل داده های مشتری ها",
     *                example ="گرفتن کل داده های مشتری ها",
     *                value = {"status":"error","code":401,"message":"Unauthenticated.","errors":{},"data":{}}
     *              )
     *          )
     *       ),
     * )
     */
    public function index()
    {
        $customer = $this->repository->getAll();
        return new CustomerResource($customer);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
