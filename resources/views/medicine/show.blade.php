@extends('layout.conquer')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<body>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Data</th>
            <th scope="col">Result</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Generic Name</th>
            <td>{{ $data->generic_name }}</td>
          </tr>
          <tr>
            <th scope="row">Form</th>
            <td>{{ $data->form }}</td>
          </tr>
          <tr>
            <th scope="row">restrection formula</th>
            <td>{{ $data->restriction_formula }}</td>
          </tr>
          <tr>
            <th scope="row">Price</th>
            <td>{{ $data->price }}</td>
          </tr>
          <tr>
            <th scope="row">Description</th>
            <td>{{ $data->description }}</td>
          </tr>
          <tr>
            <th scope="row">Image</th>
            <td><img src="{{ asset('images/'.$data->image) }}" alt=""></td>
          </tr>
        </tbody>
      </table>
      
</body>
@endsection