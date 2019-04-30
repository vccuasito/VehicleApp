@extends('vehicles.layout')

@section('content')
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Vehicles</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('vehicles.create') }}">Add Vehicle</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Number of Wheels</th>
            <th>Color</th>
            <th width="280px">Actions</th>
        </tr>
        @foreach ($vehicles as $vehicle)
            <tr>
                <td>{{ $vehicle->id }}</td>
                <td>{{ $vehicle->name }}</td>
                <td>{{ $vehicle->numberofwheels }}</td>
                <td>{{ $vehicle->color }}</td>
                <td>
                    <form action="{{ route('vehicles.destroy',$vehicle->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('vehicles.show',$vehicle->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('vehicles.edit',$vehicle->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $vehicles->links() !!}

@endsection