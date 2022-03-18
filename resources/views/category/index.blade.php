@extends('layout.conquer')

@section('content')
<body>
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Obat</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($result as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['description'] }}</td>
                <td>
                @foreach ($item->medicines as $m)
                    {{ $m->generic_name }}S<br>
                @endforeach
              </td>
              </tr>
            @endforeach
        </tbody>
      </table>
</body>
@endsection