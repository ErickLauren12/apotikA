@extends('layout.conquer')

@section('content')
    <h2>List Of Supplier</h2>
    
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Category</th>
            <th scope="col">
                <a href="{{ url('supplier/create') }}" class="btn btn-info" type="button">
                    Tambah
                </a>
            </th>
          </tr>
        </thead>
        <tbody>
            @foreach ($result as $item) 
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['address'] }}</td>
                <td>
                    @foreach ($categories as $itemCat)
                        @if ($itemCat['id'] == $item['category_id'])
                        {{ $itemCat['name'] }}
                        @endif
                    @endforeach
                </td>
                <td>
                    <a href="{{ url('supplier/'.$item['id']).'/edit' }}" class="btn btn-warning">Edit</a>

                    <form method="POST" action="{{ url('supplier/'.$item['id']) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Hapus" class="btn btn-danger"
                            onclick="if(!confirm('Apakah anda yakin menghapus data {{ $item['name'] }}')) return false"
                        />
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
          
@endsection