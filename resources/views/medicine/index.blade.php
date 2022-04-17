@extends('layout.conquer')

@section('content')
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Generic Name</th>
            <th scope="col">Form</th>
            <th scope="col">Formula</th>
            <th scope="col">Photo</th>
            <th scope="col">Price</th>
            <th scope="col">Detail</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($result as $item) 
            <tr>
                <td>{{ $item['generic_name'] }}</td>
                <td>{{ $item['form'] }}</td>
                <td>{{ $item['restriction_formula'] }}</td>
                <td><a data-toggle="modal" href="#detail_{{ $item->id }}"><img src="{{ asset('images/'.$item->image) }}" height="100px" width="120px"></a>

                <div class="modal fade" id="detail_{{$item->id}}" tabindex="-1" role="basic" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">{{$item->generic_name}} {{$item->form}}</h4>
                        </div>
                        <div class="modal-body">
                                <img src="{{asset('images/'.$item->image) }}" height='400px' />
                        </div>
                  <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                  </div>
                </div>
                </td>

                <td>{{ $item['price'] }}</td>
                <td>
                  <a class='btn btn-info' href="{{route('medicines2.show',$item->id)}}"
                     data-target="#show{{$item->id}}" data-toggle='modal'>detail</a>        
                  <div class="modal fade" id="show{{$item->id}}" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                     <div class="modal-content">
                       <!-- put animated gif here -->
                     </div>
                    </div>
                  </div>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
          
@endsection