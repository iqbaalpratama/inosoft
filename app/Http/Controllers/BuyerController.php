<?php

namespace App\Http\Controllers;

use App\Services\BuyerService;
use Exception;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    protected BuyerService $buyerServices;

    public function __construct(BuyerService $buyerServices)
    {
        $this->buyerServices = $buyerServices;
    }

    public function getAll()
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->buyerServices->getAllBuyer();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);

    }

    public function getById($id)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->buyerServices->getBuyerById($id);
            if(is_null($result['data'])){
                $result['status'] = 404;
                $result['error'] = 'Buyer not found';
            }
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }

    public function getByName(Request $request)
    {
        $name = $request->query('name');
        $result = ['status' => 200];

        try {
            $result['data'] = $this->buyerServices->getBuyerByName($name);
            if(is_null($result['data'])){
                $result['status'] = 404;
                $result['error'] = 'Buyer not found';
            }
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }

}
