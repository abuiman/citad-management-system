@extends('adminlte::page')

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
                                <td><input type="date" name="to" class="form-control" /></td>                               
                                <td> &nbsp;</td>
                                <td><button type="submit" class="btn btn-info" id="fetch_month"> Fetch Record</button></td>
                            </tr>
                        </table>    
                    </form> 

                    <div class="card">
                    <div class="card-body">

                        @php
                        $heads = [
                            'SN',
                            'Full Name',
                            'Event/Program',
                            'Venue',
                            'Date',
                            'Email',
                            'Action',
                        ];

                        @endphp

                        {{-- Minimal example / fill data using the component slot --}}
                        <x-adminlte-datatable id="table1" :heads="$heads" striped hoverable with-buttons>
                        @php $n = 1; @endphp
                        @foreach($events as $event)
                            <tr>
                                <td>{{ $n++ }}</td>
                                <td>{{strtoupper($event->name)}}</td>
                                <td>{{strtoupper($event->event)}}</td>
                                <td>{{$event->hall_id}}</td>
                                <td>{{$event->event_date}}</td>
                                <td>{{$event->email}}</td>
                                <td>
                                    <a href="{{ route('events.edit',$event->id) }}">
                                    <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </button>
                                    </a>

                                    <a href="{{url('delete/'.$event->id)}}">
                                    <button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                        <i class="fa fa-lg fa-fw fa-trash"></i>
                                    </button>
                                    </a>

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
