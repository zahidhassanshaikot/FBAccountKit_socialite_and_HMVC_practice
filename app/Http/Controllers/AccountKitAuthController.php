<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;
use AccountKit;
use App\Http\Requests;

class AccountKitAuthController extends Controller
{
    /**
     * $appId
     * @var [int]
     */
    protected $appId;

    /**
     * [$appSecret description]
     * @var [string]
     */
   protected $appSecret;

   /**
    * [$tokenExchangeUrl description]
    * @var [type]
    */
   protected $tokenExchangeUrl;

   /**
    * [$endPointUrl description]
    * @var [type]
    */
   protected $endPointUrl;

   /**
    * [$userAccessToken description]
    * @var [type]
    */
   public $userAccessToken;

   /**
    * [$refreshInterval description]
    * @var [type]
    */
   protected $refreshInterval;

   /**
    * [__construct description]
    */
   public function __construct()
   {
      // $this->appId            = '2446394025418142';
      $this->appId            = env('ACCOUNTKIT_APP_ID');
      $this->client           = new GuzzleHttpClient();
      $this->appSecret        = env('ACCOUNTKIT_APP_SECRET');
      $this->endPointUrl      = env('END_POINT');
      $this->tokenExchangeUrl = env('TOKEN_EXCHANGE');
      // $this->appId            = config('accountkit.appId');
      // $this->client           = new GuzzleHttpClient();
      // $this->appSecret        = config('accountkit.ACCOUNTKIT_APP_SECRET');
      // $this->endPointUrl      = config('accountkit.end_point');
      // $this->tokenExchangeUrl = config('accountkit.tokenExchangeUrl');
   }


  /**
   * [login description]
   * @param  Request $request [description]
   * @return [type]           [description]
   */
  public function login(Request $request)
  {
    $url = $this->tokenExchangeUrl.'grant_type=authorization_code'.
    '&code='. $request->get('code').
    "&access_token=AA|$this->appId|$this->appSecret";
  
    $apiRequest = $this->client->request('GET', $url);
    // $otpLogin = AccountKit::accountKitData($request->code);
    

      $body = json_decode($apiRequest->getBody());
      $this->userAccessToken = $body->access_token;
      $this->refreshInterval = $body->token_refresh_interval_sec;

      return $this->getData();
  }

  public function getData()
  {
      $request = $this->client->request('GET', $this->endPointUrl.$this->userAccessToken);
   
      $data = json_decode($request->getBody());
      // dd($data);

      $userId = $data->id;

      $userAccessToken = $this->userAccessToken;

      $refreshInterval = $this->refreshInterval;

      $phone = isset($data->phone) ? $data->phone->number : '';

      $email = isset($data->email) ? $data->email->address : '';
// return $phone;
      return view('index', compact('phone', 'email', 'userId', 'userAccessToken', 'refreshInterval'));
  }

  public function logout()
  {
      return redirect('auth/social');
  }

  public function index()
  {
    return view('welcome');
  }

// // login function
// public function n_login() {
//   if ($this->session->userdata('login_status') == 1)
//       redirect(base_url() . 'user/profile', 'refresh');
//   $fb_app_id          =   $this->db->get_where('config' , array('title' =>'phone_login_fb_app_id'))->row()->value;
//   $fb_app_secret      =   $this->db->get_where('config' , array('title' =>'phone_login_fb_app_secret'))->row()->value;
//   if($this->input->post("code") && !empty($this->input->post("code"))){
//       $code                 = $this->input->post("code");
//       $csrf_nonce           = $this->input->post("csrf_nonce");
//       $ch = curl_init();
//       // Set url elements
//       $token = 'AA|'.$fb_app_id.'|'.$fb_app_secret;
//       // Get access token
//       $url = 'https://graph.accountkit.com/v1.0/access_token?grant_type=authorization_code&code='.$code.'&access_token='.$token;
//       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//       curl_setopt($ch, CURLOPT_URL,$url);
//       $result=curl_exec($ch);
//       $info = json_decode($result);
//       // Get account information
//       $url = 'https://graph.accountkit.com/v1.0/me/?access_token='.$info->access_token;
//       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );
//       curl_setopt($ch, CURLOPT_URL,$url);
//       $result=curl_exec($ch);
//       curl_close($ch);
//       $final = json_decode($result);
//       $phone = $final->phone->country_prefix.$final->phone->national_number;
//       if($this->common_model->check_phone($phone)):
//           $this->common_model->create_session_by_phone($phone);
//       else:
//           $email                  = $final->id."@".$phone.'.com';
//           if(!empty($final->email) && $final->email !=NULL):
//               $email              = $final->email->address;
//           endif;

//           $data['user_id']        = $final->id;
//           $data['phone']          = $phone;
//           $data['name']           = "Your Name";
//           $data['password']       = md5($phone);
//           $data['email']          = $email;
//           $data['username']       = $email;
//           $data['role']           = 'subscriber';
//           $data['join_date']      = date('Y-m-d H:i:s');
//           $data['last_login']     = date('Y-m-d H:i:s');
//           $this->common_model->create_user_and_session($data);
//       endif;
//       redirect(base_url('my-account/profile'), 'refresh');
//   }
//   $data['page_name']      = 'login';
//   $data['title']          = 'Login | Signup';
//   $data['fb_app_id']      = $fb_app_id;
// $this->load->library('google');
//   $data['facebook_login_url'] = $this->facebook->getLoginUrl(array(
//           'redirect_uri' => site_url('user/facebook_login'), 
//           'scope' => array("email") // permissions here
//       ));
// $data['login_url']      = $this->google->login_url();        
//   $this->load->view('front_end/index', $data);
// }


}
