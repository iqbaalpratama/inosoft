<?php

namespace App\Http\Controllers;

use App\Services\SellingMotorcycleService;
use Illuminate\Http\Request;
use Exception;

class SellingMotorcycleController extends Controller
{
    protected SellingMotorcycleService $sellingMotorcycleServices;

    public function __construct(SellingMotorcycleService $sellingMotorcycleServices)
    {
        $this->sellingMotorcycleServices = $sellingMotorcycleServices;
    }

    public function save(Request $request)
    {
        $data = $request->all();
        $result = ['status' => 200];

        try {
            $result['data'] = $this->sellingMotorcycleServices->sellMotorcycle($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }
}
