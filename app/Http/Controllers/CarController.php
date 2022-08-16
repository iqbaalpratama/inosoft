<?php

namespace App\Http\Controllers;

use App\Services\CarService;
use Illuminate\Http\Request;
use Exception;

class CarController extends Controller
{
    protected CarService $carServices;

    public function __construct(CarService $carServices)
    {
        $this->carServices = $carServices;
    }

    public function getAll()
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->carServices->getAllCar();
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
            $result['data'] = $this->carServices->getCarById($id);
            if(is_null($result['data'])){
                $result['status'] = 404;
                $result['error'] = 'Car not found';
            }
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }

    public function getSellingReport($id)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->carServices->getCarSellingReport($id);
            if(is_null($result['data'])){
                $result['status'] = 404;
                $result['error'] = 'Car not found';
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
            $result['data'] = $this->carServices->getCarByName($name);
            if(is_null($result['data'])){
                $result['status'] = 404;
                $result['error'] = 'Car not found';
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
            $result['data'] = $this->carServices->saveCar($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }
        return response()->json($result, $result['status']);
    }
}
