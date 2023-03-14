@extends('adminlte::page')
@php 
if(isset($_POST['from']) && $_POST['to']){
    $from = $_POST['from'];
    $to = $_POST['to'];
}
@endphp
@section('title', 'Events of the week') 

@section('content_header')
    <h1>All Events</h1>
@stop

@section('content')
    <p></p>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i>

                        </h3>
                    </div>
                    <form method='get' id="form" enctype="multipart/form-data" action="{{ route ('viewevents.index') }}">
                        @csrf
                        <table>
                        <tr>
                                <td>From:</td>
                                <td><input type="date" name="from" class="form-control" /></td>
                                <td>To:</td>
                                <td><input type="date" name="to" class="form-control" /></td>                               
                                <td> &nbsp;</td>
                                <td><button type="submit" class="btn btn-primary" id="fetch_month"> Fetch Record</button></td>
                            </tr>
                        </table>    
                    </form> 

                    <div class="card">
                    <div class="card-body">                     

                        @php
                        $heads = [
                            'SN',
                            'Event/Program',
                            'Venue',
                            'Date',
                            'Time',
                            'For info',
                            'Action',
                        ];

                        @endphp

                        {{-- Minimal example / fill data using the component slot --}}
                        <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable with-buttons>
                        @php $n = 1; @endphp
                        @foreach($events as $event)
                            <tr>
                                <td>{{ $n++ }}</td>
                                <td>{{strtoupper($event->event)}}</td>
                                <td>{{$event->hall_id}}</td>
                                <td>{{date('D d-m-Y', strtotime($event->event_date)) .' to '. date('D d-m-Y', strtotime($event->event_end_date))}}</td>
                                <td>{{date('h:i A', strtotime($event->event_time)) .' to '. date('h:i A', strtotime($event->event_end_time))}}</td>
                                <td>{{$event->email}}</td>
                                <td>
                                    <!-- <a href="{{ route('events.edit',$event->id) }}">
                                    <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </button>
                                    </a>

                                    <a href="{{url('delete/'.$event->id)}}">
                                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                        <i class="fa fa-lg fa-fw fa-trash"></i>
                                    </button>
                                    </a> -->

                                    <a href="{{ route('events.show',$event->id) }}">
                                    <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                        <i class="fa fa-lg fa-fw fa-eye"></i>
                                    </button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </x-adminlte-datatable>
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
@stop
