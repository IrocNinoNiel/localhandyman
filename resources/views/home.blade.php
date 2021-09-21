@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if(Auth::user()->user_type == "admin")
                        <h2>Admin Panel</h2>
                    @else
                        <a href="{{ route('appointment.index') }}" class="btn btn-primary">Make Appointment</a>
                    @endif
                </div>

                <div class="card-body">
                    @include('inc.message')
                    @if(Auth::user()->user_type == "admin")
                        {{ __('Appointments') }}
                        <div class="row">
                            @foreach ($appointments as $appointment)
                                <div class="col-lg-2 col-xl-6 mb-4">
                                    <div class="card shadow border-left-primary py-2">
                                        <div class="card-body">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col mr-2">
                                                    <div class="mb-2">
                                                        <a class="btn" data-toggle="collapse" href="#{{$appointment->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>{{\Carbon\Carbon::parse($appointment->date)->format('M d, Y, D')}}</span></div>
                                                        </a>
                                                        <div class="text-dark font-weight-bold h5 mb-0"><span></span></div>
                                                    </div>
                                                    <div class="collapse" id={{$appointment->id}}>
                                                        <div class="card card-body">
                                                            <p><b>Details</b>: {{$appointment->details}}</p>
                                                            <p><b>Hour Limit</b>: {{$appointment->hour_limit}} hours</p>
                                                            <p><b>time</b>: {{$appointment->time}}</p>
                                                            <p><b>By</b>: {{$appointment->user->name}}</p>
                                                        </div>
                                                        <div class="row ml-1 mt-2">
                                                            {{-- <div class="mr-1">
                                                                <button class="btn btn-danger"><i class="far fa-times-circle"></i></button>
                                                            </div>
                                                            <div class="ml-1">
                                                                <button class="btn btn-warning"><i class="fas fa-user-edit"></i></button>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        {{ __('Your Appointments') }}
                        <div class="row">
                            @foreach (Auth::user()->appointments as $appointment)
                                <div class="col-lg-2 col-xl-6 mb-4">
                                    <div class="card shadow border-left-primary py-2">
                                        <div class="card-body">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col mr-2">
                                                    <div class="mb-2">
                                                        <a class="btn" data-toggle="collapse" href="#{{$appointment->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>{{\Carbon\Carbon::parse($appointment->date)->format('M d, Y, D')}}</span></div>
                                                        </a>
                                                        <div class="text-dark font-weight-bold h5 mb-0"><span></span></div>
                                                    </div>
                                                    <div class="collapse" id={{$appointment->id}}>
                                                        <div class="card card-body">
                                                            <p><b>Details</b>: {{$appointment->details}}</p>
                                                            <p><b>Hour Limit</b>: {{$appointment->hour_limit}} hours</p>
                                                            <p><b>time</b>: {{$appointment->time}}</p>
                                                        </div>
                                                        <div class="row ml-1 mt-2">
                                                            {{-- <div class="mr-1">
                                                                <button class="btn btn-danger"><i class="far fa-times-circle"></i></button>
                                                            </div>
                                                            <div class="ml-1">
                                                                <button class="btn btn-warning"><i class="fas fa-user-edit"></i></button>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
