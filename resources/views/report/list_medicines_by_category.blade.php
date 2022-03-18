@extends('layout.conquer')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<p>Total Data = {{ $getTotalData }}</p>
<body>
    <table class="table table-dark">
        <thead>
          <tr>
            <th>Nama</th>
            <th>Bentuk</th>
            <th>Formula</th>
            <th>Foto</th>
            <th>Harga</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($result as $d)
            <tr>
                <td>{{$d->generic_name}}</td>
                <td>{{$d->form}}</td>
                <td>{{$d->restriction_formula}}</td>
                <td>
                    <img src="{{ asset('images/'.$d->image) }}"
                     height="100px" />
                </td>
                <td>{{$d->price}}</td>
              </tr>
            @endforeach
        </tbody>
      </table>
</body>
</html>
@endsection