@extends('admin.layout')

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
            <form method="post" action="{{ route('category.update', $category->id) }}">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <label for="name">Book Name:</label>
                    <input type="text" class="form-control" name="thematic_id" value="{{$category->thematic_id}}"/>
                </div>
                <div class="form-group">
                    <label for="price">Book ISBN Number :</label>
                    <input type="text" class="form-control" name="value" value="{{$category->value}}"/>
                </div>
                <div class="form-group">
                    <label for="quantity">Book Price :</label>
                    <input type="text" class="form-control" name="name" value="{{$category->name}}"/>
                </div>
                <button type="submit" class="btn btn-primary">Update Book</button>
            </form>
        </div>
    </div>
@endsection