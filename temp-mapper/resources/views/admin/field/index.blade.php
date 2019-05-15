<!-- index.blade.php -->

@extends('admin.field.layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Value</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($field as $data)
                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->value}}</td>
                    <td>
                        <form action="{{ route('field.destroy',$data->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('field.show',$data->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('field.edit',$data->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection