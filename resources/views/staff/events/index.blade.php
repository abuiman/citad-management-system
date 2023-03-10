@extends('adminlte::page')

@section('title', 'Events')

@section('content_header')
    <h1>My Events</h1>
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
                            
                            <a class="btn btn-primary text-right" href="{{ route('events.create') }}"> Create New event</a>
                        </h3>
                    </div>

                    <div class="card">
                    <div class="card-body">

                        @php
                        $heads = [
                            'SN',
                            'Event/Program',
                            'Venue',
                            'Date',
                            'Time',
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
                                <td>{{ucwords($event->hall_id)}}</td>
                                <td>{{date('D d-m-Y', strtotime($event->event_date))}}</td>
                                <td>{{date('h:i A', strtotime($event->event_time))}}</td>
                                <td>
                                    <a href="{{ route('events.edit',$event->id) }}">
                                    <button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </button>
                                    </a>

                                    <a href="{{ route('events.show',$event->id) }}">
                                    <button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                                        <i class="fa fa-lg fa-fw fa-eye"></i>
                                    </button>
                                    </a>

                                    <form action="{{ route('events.destroy',$event->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                                            <i class="fa fa-lg fa-fw fa-trash"></i>
                                        </button>
                                    </form>
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
