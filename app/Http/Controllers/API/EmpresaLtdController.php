<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Log;
use Laravel\Sanctum\HasApiTokens;

use App\Models\EmpresaLtd;


class EmpresaLtdController extends BaseController
{
    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Log::info(__CLASS__." ".__FUNCTION__);
        
        $success['data'] = array();
        Log::info($success);
        return $this->sendResponse($success, 'User login successfully.');
        
    }

 
    public function store(Request $request)
    {
        Log::info(__CLASS__." ".__FUNCTION__);

        foreach ($request->except('_token') as $key => $value) {
            Log::debug("$key => $value");
            EmpresaLtd::create(array('empresa_id' => auth()->user()->empresa_id
                    ,'ltd_id' => $value ));
        }
        
        
        
        $success['name'] = "nombre";
        
        return $this->sendResponse($success, 'User login successfully.');
    }
}
