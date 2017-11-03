<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @param $message
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseError($message, $status = 200) {
        return response()->json([
            'status' => 'ERROR',
            'error' => $message
        ], $status);
    }

    /**
     * @param null $data
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function responseSuccess($data = null, $status = 200) {
        $responseData = [];
        if($data) {
            $responseData['data'] = $data;
        }
        return response()->json(array_merge(['status' => 'SUCCESS'], $responseData), $status);
    }

    /**
     * @param $request
     * @param array $rules
     * @return bool
     */
    protected function validateRequest($request, array $rules)
    {
        // Perform Validation
        $validator = Validator::make($request, $rules);
        if ($validator->fails()) {
            $errorMessages = $validator->errors()->messages();
            // crete error message by using key and value
            foreach ($errorMessages as $key => $value) {
                $errorMessages[$key] = $value[0];
            }
            return $errorMessages;
        }

        return true;
    }

}
