<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Shorten Url</title>
  </head>
  <body>
     <div class="container">
        <h1>Laravel Create URL Shortner</h1>
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card mt-2">
            <div class="card-header">
                <form method="post" action="{{ route('generate.short.link') }}">
                   @csrf
                   <div class="text-danger"> @error('link') {{ $message }} @enderror</div>
                   <div class="input-group mb-3">
                    <input type="text" name="link" class="form-control" placeholder="Enter URL">
                    <div class="input-group-addon">
                        <button class="btn btn-success">Generate Short URL</button>
                    </div>
                   </div>
                </form>
            </div>
        </div>

        <table class="table table-bordered mt-5">
           <thead>
            <tr>
                <th>ID</th>
                <th>Short URL</th>
                <th>URL</th>
            </tr>
           </thead>
           <tbody>
            @foreach ($shorten as $url)
                 <tr>
                    <td>{{ $url->id }}</td>
                    <td><a href="{{ url($url->code) }}" target="_blank">{{ url($url->code) }}</a></td>
                    <td>{{ $url->link }}</td>
                 </tr>
            @endforeach
           </tbody>
        </div>

     </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
