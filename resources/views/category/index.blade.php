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
                <a class='btn btn-xs btn-info' data-toggle='modal' data-target='#myModal'
                onclick='showProducts({{ $item->id }})'>
                Detail</a>
              </td>
              </tr>
            @endforeach
        </tbody>
      </table>

      <div class="modal fade" id="myModal" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog modal-wide">
           <div class="modal-content" id="showproducts">
            
            <div class="modal-header">
              <h4 class="modal-title">Data Obat</h4>
            </div>
            <div class="modal-body">

            <img src="{{ asset('images/loading-spinner-default.gif') }}" class="card-img-top" height="40px" width="40px">
             <!--loading animated gif can put here-->
           </div>
           <div id="showData">
           </div>
        </div>
      </div>

      
</body>
@endsection

@section('javascript')
<script>
    function showProducts(category_id){
        $.ajax({
            type: 'GET',
            url: '{{ url("/report/listmedicine/")}}'+"/"+category_id,
            data:{'_token':'<?php echo csrf_token()?>',
              'category_id':category_id
            },
            success:function(data){
              $("#showData").html(data)
            }
        });
    }
</script>
@endsection