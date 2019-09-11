<?php

namespace Customer\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;


class CustomerController extends Controller
{
   public function index(){
    //    return 'hi i am from backend';
       return view('Customer::BackEnd.index');
   }
}
