<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;

class ProductController extends BaseController
{
     public function test(){
         return $this->sendResponse('User register successfully.');
    }
}
