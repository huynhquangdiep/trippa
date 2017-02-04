@extends('frontend.home.app')

@section('header')
    @extends('frontend._partials.header')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    @foreach ($users as $user)
                        {{ $user->userName }}
                        <br>
                        {{ $user->email }}
                        <br><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @extends('frontend._partials.footer')
@endsection
