@extends('adminlte::page')

@section('title', 'Event')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i>

                        </h3>
                    </div>

                    <div class="card">
                    <div class="card-body">

        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
            <h2>Event</h2>
            <a class="btn btn-primary text-right" href="{{ route('events.index') }}"> Back</a>
            </div>

            <div class="modal-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('events.store') }}" >
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Event/Program: <b style="color:red;">*</b></strong>
                    <textarea autocomplete="on" autofocus name="event" rows="3" cols="30" placeholder="Type your Event/Program here..." class="form-control" required></textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12" >
            <label for="locations"> Choose Your Venue:<b style="color:red;">*</b></label>
            <div class="text-container">
                <input type="text" list="locations" name="hall_id" placeholder="Enter Here" class="form-control" autocomplete="on" />
                <datalist id="locations">
                    <option value="CITAD HALL A">
                    <option value="CITAD HALL B">
                    <option value="CITAD ONLINE RADIO">
                    <option value="CITAD BOARD ROOM">
                </datalist>
            </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12" style="display:none;" id="venue">
                <div class="form-group">
                    <strong>Venue: <b style="color:red;">*</b></strong>
                    <input type="text" name="venue" value="3" class="form-control">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Start Date: <b style="color:red;">*</b></strong>
                    <input type="date" name="event_date" value="" class="form-control" data-auto-apply="true" required>
            </div>
          </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Start Time: <b style="color:red;">*</b></strong>
                    <input type="time" name="event_time" class="form-control" require>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Add end date:</strong>
                    <input type="button" name="end" id="end" value="+" class="form-control" />
                </div>
            </div>
            
            <div class="col-xs-6 col-sm-6 col-md-6" style="display:;" id="end-date">
                <div class="form-group">
                    <strong>End Date:</strong>
                    <input type="date" name="event_end_date" value="" class="form-control" data-auto-apply="true">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6" style="display:;" id="end-time">
                <div class="form-group">
                    <strong>End Time:</strong>
                    <input type="time" name="event_end_time" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" style="display:none;" id="remove">
                <div class="form-group">
                    <strong>Remove end date:</strong>
                    <input type="button" name="remove" id="remove" value="-" class="form-control" />
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <!-- <script>
    $(function() {
      $('input[name="event_date"]').daterangepicker({
        opens: 'top'
      }, function(start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
      });
    });
    </script>
    <script src="/vendor/daterangepicker/moment.min.js"></script> -->
    <script>
        $(document).ready(function(){
        $("#end").click(function(){
            $("#end-date").fadeIn();
            $("#end-time").fadeIn();
            $("#remove").fadeIn();
            
        });
        $("#remove").click(function(){
                $("#end-date").fadeOut();
                $("#end-time").fadeOut();
                $("#remove").fadeOut();
            });
        $("#location").click(function(){ 
            if($("#other").is(':checked')){
                $("#venue").fadeIn();
            }else if($('#hall').is(':checked')){
                  $('#venue').fadeOut();
            }
            });
        });
        
    </script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
@stop
