@extends('layout.conquer')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<body>
    <!--<table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Generic Name</th>
            <th scope="col">Form</th>
            <th scope="col">Formula</th>
            <th scope="col">Photo</th>
            <th scope="col">Price</th>
          </tr>
        </thead>
        <tbody>
            {{--@foreach ($result as $item)
            <tr>
                <td>{{ $item['generic_name'] }}</td>
                <td>{{ $item['form'] }}</td>
                <td>{{ $item['restriction_formula'] }}</td>
                <td><img src="{{ asset('images/'.$item->image) }}" height="100px" width="120px"></td>
                <td>{{ $item['price'] }}</td>
              </tr>
            @endforeach--}}
        </tbody>
      </table>-->
      
      <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($result as $item)
        <div class="col">
          <a href="/medicines/{{ $item->id }}">
          <div class="card">
            <img src="{{ asset('images/'.$item->image) }}" class="card-img-top" height="300px">
            <div class="card-body">
              <h5 class="card-title">{{ $item->generic_name }}</h5>
              <p>Kategory: {{ $item->category->name }}</p>
              <p class="card-text">{{ $item->form }}</p>
            </div>
          </div>
        </a>
        </div>
        @endforeach
      </div>
      
</body>
@endsection