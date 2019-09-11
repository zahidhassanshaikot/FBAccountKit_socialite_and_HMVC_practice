<?php

namespace Customer\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;


class CustomerController extends Controller
{
   public function index(){
      //  return 'hi i am from front-end';
       return view('Customer::FrontEnd.index');
   }
}
