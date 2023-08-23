<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Repositories\CustomerRepository;
use App\Http\Helpers\Helpers;
use Illuminate\Database\QueryException;

class CustomerController extends Controller
{
    protected $repository;
    public function __construct(CustomerRepository $repository)
    {
        $this->repository = $repository;
    }

      /**
     * @OA\Get(
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
     * @OA\Post(
     * path="/api/v1/customers",
     * tags={"Customer"},
     * summary="وارد کردن اطلاعات ",
     * description="وارد کردن اطلاعات ",
     * security={ {"sanctum": {} }},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *            mediaType="application/json",
     *            @OA\Schema(
     *               type="object",
     *               required={"firstname","lastname","date_of_birth","email","bank_account"},
     *               @OA\Property(property="firstname", type="string"),
     *               @OA\Property(property="lastname", type="string"),
     *               @OA\Property(property="date_of_birth", type="date"),
     *               @OA\Property(property="email", type="string"),
     *               @OA\Property(property="phonenumber", type="+1 650 253 0000"),
     *               @OA\Property(property="bank_account", type="string"),
     *            ),
     *        ),
     *    ),
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
     *          description="وارد کردن اطلاعات ",
     *          @OA\JsonContent(
     *             @OA\Examples(
     *                summary="وارد کردن اطلاعات ",
     *                example ="وارد کردن اطلاعات ",
     *                value = {"status":"success","code":200,"message":"Saved","errors":{},"data":{"id":null,"firstname":null,}}
     *              )
     *          )
     *       ),
     * )
     */
    public function store(StoreCustomerRequest $request)
    {
        $validate = $request->validated();
        try {
            $customer = $this->repository->store($validate);
            return Helpers::setResponse([
                'message' => __("Saved."),
                'status' => 'success',
                'code' => 200,
                "data" => $customer,
            ]);
        } catch (QueryException $e) {

            return Helpers::setResponse([
                'message' => $e->getMessage(),
                'status' => 'error',
                'code' => 422,
                'errors' => $e->errorInfo
            ]);
        }
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
     * @OA\Put(
     * path="/api/v1/customers/{customer}",
     * tags={"Customer"},
     * summary="به روز رسانی اطلاعات ",
     * description="به روز رسانی اطلاعات ",
     * security={ {"sanctum": {} }},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *            mediaType="application/json",
     *            @OA\Schema(
     *               type="object",
     *               required={"firstname","lastname","date_of_birth","email","bank_account"},
     *               @OA\Property(property="firstname", type="string"),
     *               @OA\Property(property="lastname", type="string"),
     *               @OA\Property(property="date_of_birth", type="date"),
     *               @OA\Property(property="email", type="string"),
     *               @OA\Property(property="phonenumber", type="+1 650 253 0000"),
     *               @OA\Property(property="bank_account", type="string"),
     *            ),
     *        ),
     *    ),
     *     @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="Customer ID",
     *         required=true,
     *      ),
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
     *          description="به روز رسانی اطلاعات ",
     *          @OA\JsonContent(
     *             @OA\Examples(
     *                summary="به روز رسانی اطلاعات ",
     *                example ="به روز رسانی اطلاعات ",
     *                value = {"status":"success","code":200,"message":"Saved","errors":{},"data":{"id":null,"firstname":null,}}
     *              )
     *          )
     *       ),
     * )
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $validate = $request->validated();
        try {
            $customer = $this->repository->update($validate , $customer);
            return Helpers::setResponse([
                'message' => __("Information updated successfully."),
                'status' => 'success',
                'code' => 200,
                "data" => $customer,
            ]);
        } catch (QueryException $e) {

            return Helpers::setResponse([
                'message' => $e->getMessage(),
                'status' => 'error',
                'code' => 422,
                'errors' => $e->errorInfo
            ]);
        }
    }

     /**
     * @OA\Delete(
     * path="/api/v1/customers/{customer}",
     * tags={"Customer"},
     * summary="حذف مشتری ",
     * description="حذف مشتری",
     * security={ {"sanctum": {} }},
     *    @OA\Parameter(
     *          description="application/json;",
     *          in="header",
     *          name="Accept",
     *          required=true,
     *          @OA\Schema(type="string"),
     *      ),
     *
     *    @OA\Parameter(
     *         name="id",
     *         in="query",
     *         description="Customer ID",
     *         required=true,
     *      ),
     *     @OA\Response(
     *          response=200,
     *          description="حذف مشتری",
     *          @OA\JsonContent(
     *             @OA\Examples(
     *                summary="حذف مشتری",
     *                example ="حذف مشتری",
     *                value = {"status":"success","code":200,"message":"The item was deleted!","errors":{},"data":{}}
     *              )
     *          )
     *       ),
     * )
     */
    public function destroy(Customer $customer)
    {
        $this->repository->delete($customer);
        return Helpers::setResponse([
            'message' => __('The item was deleted!'),
            'status' => 'success',
            'code' => 200,
        ]);
    }
}
