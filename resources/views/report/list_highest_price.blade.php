@extends('layout.conquer')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<body>
    <table class="table table-dark">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Generic Name</th>
            <th>Harga</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($result as $d)
            <tr>
                <td>{{$d->name}}</td>
                <td>{{$d->generic_name}}</td>              
                <td>{{$d->price}}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
</body>
</html>
@endsection