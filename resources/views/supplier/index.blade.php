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

                <a href="#modalCreate" class="btn btn-info" type="button" data-toggle = 'modal'>
                    Tambah (With Modal)
                </a>
                <div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content" >
                        <div class="modal-header">
                          <button type="button" class="close" 
                            data-dismiss="modal" aria-hidden="true"></button>
                          <h4 class="modal-title">Add New Supplier</h4>
                        </div>
                        <div class="modal-body">
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
                                    <form role="form" method="POST" action="{{ url('supplier') }}">
                                        @csrf
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Text</label>
                                                <input name="name" type="text" class="form-control" id="nama" placeholder="Enter text">
                                                <span class="help-block">
                                                Isikan Nama </span>
                                            </div>
                            
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea name="address" class="form-control" rows="3"></textarea>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select class="form-control" name="id_category" id="">
                                                    <option>Pilih</option>
                                                    @foreach ($categories as $item)
                                                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info">Submit</button>
                            <a data-dismiss="modal" class="btn btn-default">Cancel</a>
                        </div>
                      </div>
                    </div>
                  </div>
        
            </th>
          </tr>
        </thead>
        <tbody>
            @foreach ($result as $item) 
            <tr id="tr_{{ $item['id'] }}">
                <td id="td_name_{{ $item['id'] }}">{{ $item['name'] }}</td>
                <td id="td_address_{{ $item['id'] }}">{{ $item['address'] }}</td>
                <td id="td_category_{{ $item['id'] }}">
                    @foreach ($categories as $itemCat)
                        @if ($itemCat['id'] == $item['category_id'])
                        {{ $itemCat['name'] }}
                        @endif
                    @endforeach
                </td>
                <td>
                    <a href="{{ url('supplier/'.$item['id']).'/edit' }}" class="btn btn-info">Edit</a>
                    <a href="#modalEdit" data-toggle="modal" class="btn btn-warning" onclick="getEditForm({{ $item['id'] }})">Edit Type A</a>
                    <div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" id="modalContent" name="modalContent">
                            </div>
                        </div>
                    </div>
                    <a href="#modalEdit" data-toggle="modal" class="btn btn-warning" onclick="getEditForm2({{ $item['id'] }})">Edit Type B</a>
                </td>
                <td>
                    @can('delete-permission', $item)
                    <form method="POST" action="{{ url('supplier/'.$item['id']) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Hapus" class="btn btn-danger"
                            onclick="if(!confirm('Apakah anda yakin menghapus data {{ $item['name'] }}')) return false"
                        />
                    </form>
                    <a class="btn btn-danger" onclick="if(confirm('are you sure to delete this record?')) deleteDataRemoveTR({{ $item['id'] }})">
                        Hapus 2
                    </a>
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
                  url: '{{ route("supplier.getEditForm") }}',
                  data: {'_token':'<?php echo csrf_token() ?>',
                    'id' : id
                },
                success: function(data){
                    $('#modalContent').html(data.msg)
                }
              });
          }

          function getEditForm2(id){
              $.ajax({
                  type: 'POST',
                  url: '{{ route("supplier.getEditForm2") }}',
                  data: {'_token':'<?php echo csrf_token() ?>',
                    'id' : id
                },
                success: function(data){
                    $('#modalContent').html(data.msg)
                }
              });
          }

          function saveDataUpdateTD(id){
              var eName = $('#eName').val();
              var eAddress = $('#eAddress').val();
              var eid_category = $('#eid_category').val();
              var category_name = $('#eid_category').find(":selected").text();
              $.ajax({
                  type: 'POST',
                  url: '{{ route("supplier.saveData") }}',
                  data: {'_token':'<?php echo csrf_token() ?>',
                    'id' : id,
                    'name' : eName,
                    'address' : eAddress,
                    'category_id' : eid_category 
                },
                success: function(data){
                    if(data.status == 'ok'){
                        $('#td_name_' + id).html(eName);
                        $('#td_address_' + id).html(eAddress);
                        $('#td_category_' + id).html(category_name);
                    }
                }
              });
          }

          function deleteDataRemoveTR(id){
              $.ajax({
                  type: 'POST',
                  url: '{{ route("supplier.deleteData") }}',
                  data: {'_token':'<?php echo csrf_token() ?>',
                    'id' : id
                },
                success: function(data){
                    if(data.status == 'ok'){
                        alert(data.msg);
                        $("#tr_"+id).remove();
                    }else{
                        alert(data.msg);
                    }
                }
              });
          }
      </script>
@endsection