@extends('layout.conquer')

@section('content')
    <h2>List Of Transaction</h2>
    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Pembeli</th>
            <th scope="col">Kasir</th>
            <th scope="col">Tanggal Transaction</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($result as $item) 
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->buyer->name }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->transaction_date }}</td>
                <td><a class="btn btn-default" data-toggle="modal" href="#basic" onclick="getDetailData2({{$item->id}});">Lihat Rincian Pembelian</a>
                
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>

      <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Detail Transaksi</h4>
              </div>
              <div class="modal-body" id="msg">

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
          </div>
        </div>
      </div>
      
@endsection

@section('javascript')
<script>
function getDetailData(id){
  $.ajax({
    type:'POST',
    url:'{{route("transaction.showAjax")}}',
    data:'_token= <?php echo csrf_token() ?> &id='+id,
      success:function(data) {
        $("#msg").html(data.msg);
      }
    });
  }

  function getDetailData2(id){
  $.ajax({
    type:'GET',
    url:'{{url("transaction/showDataAjax2/")}}/'+id,
      success:function(data) {
        $("#msg").html(data.msg);
      }
    });
  } 
</script>
@endsection