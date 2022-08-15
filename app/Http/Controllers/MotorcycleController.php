<?php

namespace App\Http\Controllers;

use App\Services\MotorcycleService;
use Illuminate\Http\Request;
use Exception;

class MotorcycleController extends Controller
{
    protected MotorcycleService $motorcycleServices;

    public function __construct(MotorcycleService $motorcycleServices)
    {
        $this->motorcycleServices = $motorcycleServices;
    }

    public function getAll()
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->motorcycleServices->getAllMotorcycle();
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
            $result['data'] = $this->motorcycleServices->getMotorcycleById($id);
            if(is_null($result['data'])){
                $result['status'] = 404;
                $result['error'] = 'Motorcycle not found';
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
            $result['data'] = $this->motorcycleServices->getMotorcycleByName($name);
            if(is_null($result['data'])){
                $result['status'] = 404;
                $result['error'] = 'Motorcycle not found';
            }
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }

    public function save(Request $request)
    {
        $data = $request->all();
        $result = ['status' => 200];

        try {
            $result['data'] = $this->motorcycleServices->saveMotorcycle($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }
}
