@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                @if ($errors->has('msg'))
                    <div class="alert alert-warning">
                        {{ $errors->first('msg') }}
                        <button type="button" data-dismiss="alert" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading text-center">Social Login </div>

                    <div class="panel-body">

                        <p class="lead text-center">Authenticate using your social network account from one of following providers</p>

                        <a href="{{ route('social.oauth', 'facebook') }}" class="btn btn-primary btn-block">
                            Login with Facebook
                        </a>

                        <a href="{{ route('social.oauth', 'twitter') }}" class="btn btn-info btn-block">
                            Login with Twitter
                        </a>

                        <a href="{{ route('social.oauth', 'google') }}" class="btn btn-danger btn-block">
                            Login with Google
                        </a>

                        <a href="{{ route('social.oauth', 'github') }}" class="btn btn-info btn-block">
                            Login with Github
                        </a>

                        <hr>

                        <a href="{{ route('login') }}" class="btn btn-primary btn-block">
                            Login with Email
                        </a>
                    </div>
                </div>


                <div class="panel panel-default" style="margin-top: 1cm">
                    <div class="panel-heading text-center">login With Account Kit </div>

                    <div class="panel-body">
                    <form action="{{ route('loginnn') }}" method="post" id="form">

                            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="code" id="code" />
                            
                        </form>
                        

                        <input value="+1" id="country" />
                        <input placeholder="phone number" id="phone"/>
                        <button onclick="smsLogin();">Login via SMS</button>
                        <div>OR</div>
                        <input placeholder="email" id="email"/>
                        <button onclick="emailLogin();">Login via Email</button>

                            


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/accountkit.js') }}"></script>
    <script type="text/javascript" src="https://sdk.accountkit.com/en_US/sdk.js"></script>
    <script src='{{asset('/')}}/js/jquery.min.js'></script>
    <script src="{{asset('/')}}/js/index.js"></script>
@endsection