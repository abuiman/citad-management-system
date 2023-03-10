@extends('adminlte::page')

@section('title', 'Event')

@section('content_header')
    <h4>Update Event</h4>
@stop

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
              <h4 class="modal-title">Update Event</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

    <form method="post" action="{{ route('events.update', $event->id) }}" >
        @method('put')
        @csrf
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Event/Program: <b style="color:red;">*</b></strong>
                    <textarea name="event" rows="3" cols="30" placeholder="Type your Event/Program here..." value="{{$event->event}}" class="form-control" require>@php echo $event->event; @endphp</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12" >
            <label for="locations"> Choose Your Venue:<b style="color:red;">*</b></label>
            <div class="text-container">
                <input type="text" list="locations" name="hall_id" value="{{$event->hall_id}}" placeholder="Enter Here" class="form-control" autocomplete="on" readonly/>
                <datalist id="locations">
                    <option value="CITAD HALL A">
                    <option value="CITAD HALL B">
                    <option value="CITAD ONLINE RADIO">
                    <option value="CITAD BOARD ROOM">
                </datalist>
            </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Start Date: <b style="color:red;">*</b></strong>
                    <input type="date" name="event_date" class="form-control" value="{{date('Y-m-d', strtotime($event->event_date)) }}" require readonly>
            </div>
          </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Start Time: <b style="color:red;">*</b></strong>
                    <input type="time" name="event_time" class="form-control"  value="{{$event->event_time}}" require readonly>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Update end date:</strong>
                    <input type="button" name="end" id="end" value="+" class="form-control" />
                </div>
            </div>
            
            <div class="col-xs-6 col-sm-6 col-md-6" style="display:;" id="end-date">
                <div class="form-group">
                    <strong>End Date:</strong>
                    <input type="date" name="event_end_date" value="{{ date('Y-m-d', strtotime($event->event_end_date)) }}" class="form-control" require readonly>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6" style="display:;" id="end-time">
                <div class="form-group">
                    <strong>End Time:</strong>
                    <input type="time" name="event_end_time"  value="{{$event->event_end_time}}" class="form-control" readonly>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" style="display:none;" id="remove">
                <div class="form-group">
                    <strong>Remove end date:</strong>
                    <input type="button" name="remove" id="remove" value="-" class="form-control" />
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>

</div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
 
      <!-- /.modal -->
      <br/><br/>                   
                        
                        
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
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
        });
    </script>
@stop