<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Upload CSV</h1>

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <form method="post" enctype="multipart/form-data" action="{{ route('csv.upload.process') }}">
                @csrf
                <div class="form-group">
                    <label for="category">Thematic</label>
                    <select class="form-control" name="category">
                        @foreach (\App\Models\Data::CATEGORIES as $index => $category)
                            <option value="{{ $index }}">{{ $category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" name="category">
                        @foreach (\App\Models\Data::CATEGORIES as $index => $category)
                            <option value="{{ $index }}">{{ $category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="year">Year</label>
                    <select class="form-control" name="year">
                        <option value="2010">2010</option>
                        <option value="2011">2011</option>
                        <option value="2012">2012</option>
                        <option value="2013">2013</option>
                        <option value="2014">2014</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="csv_file">CSV File</label>
                    <input type="file" class="form-control" id="csv_file" name="csv_file">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary mb-2">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>