@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Appointment Form</h3>
                </div>
                <div class="card-body">
                    @include('inc.message')
                    <form action="{{ route('appointment.submitAppointment')}}" method="POST">
            
                        @csrf

                        <div class="form-group">
                            <label for="details">Tell us about the job</label>
                            <textarea class="form-control @error('details') border-danger @enderror" id="details" rows="5" placeholder="Please describe the job in detail" name="details" name="details"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="details">Date</label>
                            <input type="date" class="form-control @error('date') border-danger @enderror" name="date">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">Hours you would like to book?</label>
                            <select id="exampleFormControlSelect2" class="form-control @error('hours') border-danger @enderror" name="hours">
                                <option value="2">2 hours</option>
                                <option value="3">3 Hours</option>
                                <option value="4">4 Hours</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect2">When would you like to come?</label>
                            <select id="exampleFormControlSelect2" class="form-control @error('time') border-danger @enderror" name="time">
                                <option value="7 am">7 am</option>
                                <option value="8 am">8 am</option>
                                <option value="9 am">9 am</option>
                                <option value="10 am">10 am</option>
                                <option value="2 pm">2 pm</option>
                                <option value="3 pm">3 pm</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control @error('phone_num') border-danger @enderror" id="phone_num" placeholder="Enter Phone Number" name="phone_num">
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Make Appointment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection