@extends('layout.conquer')

@section('content')
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Generic Name</th>
            <th scope="col">Form</th>
            <th scope="col">Formula</th>
            <th scope="col">Photo</th>
            <th scope="col">Price</th>
            <th scope="col">Detail</th>
            <th scope="col">
              <a href="#modalCreate" class="btn btn-info" type="button" data-toggle = 'modal'>
                Tambah (With Modal)
              </a>
              <div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
                <div class="portlet">
                  <div class="portlet-title">
                      <div class="caption">
                          <i class="fa fa-reorder"></i> Default Form
                      </div>
                      <div class="tools">
                          <a href="" class="collapse"></a>
                          <a href="#portlet-config" data-toggle="modal" class="config"></a>
                          <a href="" class="reload"></a>
                          <a href="" class="remove"></a>
                      </div>
                  </div>
                  <div class="portlet-body form" style="display: block;">
                      <form role="form" method="POST" action="{{ url('medicines') }}" enctype="multipart/form-data">
                          @csrf
                          <div class="form-body">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Generic Name</label>
                                  <input name="generic_name" type="text" class="form-control" id="generic_name" placeholder="Enter text">
                                  <span class="help-block">
                                  Generic Name </span>
                              </div>
              
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Form</label>
                                  <input name="form" type="text" class="form-control" id="form" placeholder="Enter text">
                                  <span class="help-block">
                                  Form </span>
                              </div>
              
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Restriction Formula</label>
                                  <input name="restriction_formula" type="text" class="form-control" id="formula" placeholder="Enter text">
                                  <span class="help-block">
                                  Restriction Formula </span>
                              </div>
              
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Price</label>
                                  <input name="price" type="number" class="form-control" id="price" placeholder="Enter text">
                                  <span class="help-block">
                                  Price </span>
                              </div>
                              
                              <div class="form-group">
                                  <label>Description</label>
                                  <textarea name="description" class="form-control" rows="3"></textarea>
                              </div>
                              
                              <div class="form-group">
                                  <label>Category</label>
                                  <select name="category_id" class="form-control">
                                      <option>Pilih</option>
                                      @foreach ($categories as $item)
                                          <option value="{{ $item->id }}">{{ $item->name }}</option>
                                      @endforeach
                                  </select>
                              </div>
              
                              <div class="form-group">
                                  <label>Supplier</label>
                                  <select name="supplier_id" class="form-control">
                                      <option>Pilih</option>
                                      @foreach ($suppliers as $item)
                                          <option value="{{ $item->id }}">{{ $item->name }}</option>
                                      @endforeach
                                  </select>
                              </div>
              
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Faskes 1</label>
                                  <input name="faskes1" type="number" max="1" min="0" class="form-control" id="faskes1" placeholder="Faskes 1">
                                  <span class="help-block">
                                  Faskes 1 </span>
                              </div>
              
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Faskes 2</label>
                                  <input name="faskes2" type="number" max="1" min="0" class="form-control" id="faskes2" placeholder="Faskes 2">
                                  <span class="help-block">
                                  Faskes 2</span>
                              </div>
              
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Faskes 3</label>
                                  <input name="faskes3" type="number" max="1" min="0" class="form-control" id="faskes3" placeholder="Faskes 3">
                                  <span class="help-block">
                                  Faskes 3</span>
                              </div>
              
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Image</label>
                                  <input name="image" type="file" class="form-control" id="image">
                              </div>
              
                          <div class="form-actions">
                              <button type="submit" class="btn btn-info">Submit</button>
                              <a data-dismiss="modal" class="btn btn-default">Cancel</a>
                          </div>
                      </form>
                  </div>
              </div>
              </div>
            </th>
          </tr>
        </thead>
        <tbody>
            @foreach ($result as $item) 
            <tr>
                <td>{{ $item['generic_name'] }}</td>
                <td>{{ $item['form'] }}</td>
                <td>{{ $item['restriction_formula'] }}</td>
                <td><a data-toggle="modal" href="#detail_{{ $item->id }}"><img src="{{ asset('storage/'.$item->image) }}" height="100px" width="120px"></a>

                <div class="modal fade" id="detail_{{$item->id}}" tabindex="-1" role="basic" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">{{$item->generic_name}} {{$item->form}}</h4>
                        </div>
                        <div class="modal-body">
                                <img src="{{ asset('storage/'.$item->image) }}" height='400px' />
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
                  <a href="#modalEdit" data-toggle="modal" class="btn btn-warning" onclick="getEditForm({{ $item['id'] }})">Edit Type A</a>
                  <div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" id="modalContent" name="modalContent">
                        </div>
                    </div>
                </div>
                @can('delete-permission', $item)
                    <form method="POST" action="{{ url('medicine/'.$item['id']) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Hapus" class="btn btn-danger"
                            onclick="if(!confirm('Apakah anda yakin menghapus data {{ $item['name'] }}')) return false"
                        />
                    </form>
                    @endcan
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
          
@endsection
@section('javascript')
<script>
  function getEditForm(id){
              $.ajax({
                  type: 'POST',
                  url: '{{ route("medicine.getEditForm") }}',
                  data: {'_token':'<?php echo csrf_token() ?>',
                    'id' : id
                },
                success: function(data){
                    $('#modalContent').html(data.msg)
                }
              });
          }
</script>
@endsection