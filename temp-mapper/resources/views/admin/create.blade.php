<!-- create.blade.php -->

@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Add Book
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <form method="post" action="{{ route('field.create', $field->id) }}">
                <div class="form-group">
                    @csrf
                    <label for="name">ID:</label>
                    <input type="text" class="form-control" name="id" value="{{$field->id}}"/>
                </div>
                <div class="form-group">
                    <label for="price">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{$field->name}}"/>
                </div>
                <div class="form-group">
                    <label for="quantity">Value:</label>
                    <input type="text" class="form-control" name="value"  value="{{$field->value}}"/>
                </div>
                <button type="submit" class="btn btn-primary">Create Category</button>
            </form>
        </div>
    </div>
@endsection