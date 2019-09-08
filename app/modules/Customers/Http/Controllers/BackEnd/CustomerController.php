<?php

namespace Customer\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;


class CustomerController extends Controller
{
   public function index(){
       return view('customer::backEnd.index');
   }
}
