<!-- index.blade.php -->

@extends('admin.layout')

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
                <td>Book Name</td>
                <td>ISBN Number</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($category as $book)
                <tr>
                    <td>{{$book->thematic_id}}</td>
                    <td>{{$book->name}}</td>
                    <td>{{$book->value}}</td>
                    <td>
                        <form action="{{ route('category.destroy',$book->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('category.show',$book->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('category.edit',$book->id) }}">Edit</a>
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