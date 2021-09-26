@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    @if(Auth::user()->user_type == "admin")
                        <div class="row">
                            <div class="col">
                                <h2>Admin Panel</h2>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('registeradmin.index') }}" class="btn btn-primary">Add New Admin</a>
                            </div>
                        </div>
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
                                @if($appointment->status == 1)
                                    <div class="col-lg-2 col-xl-6 mb-4">
                                    <div class="card shadow border-left-primary py-2">
                                        <div class="card-body">
                                            <div class="row align-items-center no-gutters">
                                                <div class="col mr-2">
                                                    <div class="mb-2">
                                                        <a class="btn" data-toggle="collapse" href="#{{$appointment->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>{{\Carbon\Carbon::parse($appointment->date)->format('M d, Y, D')}}</span></div>
                                                                </div>
                                                                
                                                            </div>
                                                        </a>
                                                        
                                                        <div class="text-dark font-weight-bold h5 mb-0"><span></span></div>
                                                    </div>
                                                    <div class="collapse" id={{$appointment->id}}>
                                                        <div class="card card-body">
                                                            <p><b>Details</b>: {{$appointment->details}}</p>
                                                            <p><b>Hour Limit</b>: {{$appointment->hour_limit}} hours</p>
                                                            <p><b>time</b>: {{$appointment->time}}</p>
                                                            <p><b>By</b>: {{$appointment->user->name}}</p>
                                                            <p><b>Status</b>: 
                                                                @if($appointment->status == 1) 
                                                                    <button class="btn btn-primary">Active</button>
                                                                @else 
                                                                    <button class="btn btn-danger">Done</button>
                                                                @endif
                                                            </p>
                                                            <p><div class="col text-right">
                                                                    <!-- <a class="btn btn-primary @if($appointment->status == 2) disabled @endif">Done</a> -->

                                                                    <form action="{{ route('appointment.destroy', $appointment->id) }}" method="post">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <input type="submit" class="btn btn-danger @if($appointment->status == 2) disabled @endif" value="Delete" onclick="return confirm('Are you sure you want to delete this appointment?');">
                                                                    </form>
                                                                </div></p>
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
                                @endif
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
                                                            <p><b>Status</b>: 
                                                                @if($appointment->status == 1) 
                                                                    <button class="btn btn-primary">Ongoing</button>
                                                                @else 
                                                                    <button class="btn btn-danger">Done</button>
                                                                @endif
                                                            </p>
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
