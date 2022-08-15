<?php

namespace App\Http\Controllers;

use App\Services\SellingCarService;
use Illuminate\Http\Request;
use Exception;

class SellingCarController extends Controller
{
    protected SellingCarService $sellingCarServices;

    public function __construct(SellingCarService $sellingCarServices)
    {
        $this->sellingCarServices = $sellingCarServices;
    }

    public function save(Request $request)
    {
        $data = $request->all();
        $result = ['status' => 200];

        try {
            $result['data'] = $this->sellingCarServices->sellCar($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }
}
