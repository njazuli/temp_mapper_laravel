@extends('admin.field.layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Book
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
            <form method="post" action="{{ route('field.update', $field->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">ID:</label>
                    <input type="text" class="form-control" name="id" value="{{$field->id}}"/>
                </div>
                <div class="form-group">
                    <label for="quantity">Name:</label>
                    <input type="text" class="form-control" name="name" value="{{$field->name}}"/>
                </div>
                <div class="form-group">
                    <label for="price">Value:</label>
                    <input type="text" class="form-control" name="value" value="{{$field->value}}"/>
                </div>
                <button type="submit" class="btn btn-primary">Update Book</button>
            </form>
        </div>
    </div>
@endsection