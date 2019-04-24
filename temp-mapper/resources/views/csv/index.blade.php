<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="_token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>CSV Upload</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Upload CSV</h1>

            <div class="alert alert-success alert-block" style="display: none;">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <p><strong class="message"></strong></p>
            </div>

            <div class="alert alert-danger alert-block" style="display: none;">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <p><strong class="message"></strong></p>
            </div>

            <form id="csv-upload" method="post" enctype="multipart/form-data" action="{{ route('csv.upload.process') }}">
                @csrf
                <div class="form-group">
                    <label for="thematic_id">Thematic</label>
                    <select class="form-control" name="thematic_id" id="thematic_id">
                        <option value="">--- Please Select Thematic ---</option>
                        @foreach ($thematics as $index => $thematic)
                            <option value="{{ $thematic->id }}">{{ $thematic->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group category-dropdown" style="display: none;">
                    <label for="category_id">Category</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">--- Please Select Category ---</option>
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
                    <button type="submit" class="submit btn btn-primary mb-2">Upload</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="spinner-overlay" style="background: #4a4a4a; width: 100%; height: 100%; position: absolute; top: 0; opacity: 0.6; display: none;">
</div>
<div class="spinner" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); display: none;">
    <img src="{{ asset('images/spinner.gif') }}">
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $('#thematic_id').change(function () {
       var thematicID = this.value;

        $.ajax({
            url: "/category/" + thematicID,
            method: 'get',
            success: function(result){
                result.data.forEach(function (category) {
                    $('#category_id').append(new Option(category.name, category.id));
                    $('.category-dropdown').show();
                })
            }});
    });


    $('#csv-upload').on('submit', function(event){
        event.preventDefault();
        $('.spinner-overlay').show();
        $('.spinner').show();

        $.ajax({
            url:"{{ route('csv.upload.process') }}",
            method: "POST",
            data:new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success:function(data)
            {
                $('.spinner-overlay').hide();
                $('.spinner').hide();

                if (data.success) {
                    console.log(data.success);
                    $('.alert-success .message').text(data.success);
                    $('.alert-success').show();
                }else if (typeof data.success === 'undefined') {
                    $('.alert-danger .message').text(data.err);
                    $('.alert-danger').show();
                }
            }
        })
    });
</script>
</body>
</html>