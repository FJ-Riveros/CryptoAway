@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <div id="example"></div>
                <?php 

                    //Snippet to add friends and retrieve them
                    use App\Models\User;

                    $user = User::find(1);
                    // $friend = User::find(2);
                    
                    // $user->addFriend($friend);
                    // $friend->addFriend($user);

                    // var_dump($user->friends);

                ?> 
            </div>
        </div>
    </div>
</div>
@endsection
