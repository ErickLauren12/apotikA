@extends('layouts.frontend')

@section('title', 'Cart')

@section('content')

<div class="portlet-title">
    <b>Pemesanan dari Transaksi kode: {{ $transaction->id }}</b><br>
    <b>Tanggal pemesanan: {{ $transaction->transaction_date }}</b><br>
</div>
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
        </thead>
        <tbody>
            <?php $ts = $transaction->medicines?>
                @foreach ($ts as $item)
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ asset('images/'.$item['photo']) }}" width="100" height="100" alt="..." class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $item['generic_name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">Rp. {{ $item['price'] }}</td>
                    <td data-th="Quantity">
                        {{ $item->pivot['quantity'] }}
                    </td>
                    <td data-th="Subtotal" class="text-center">Rp. {{ $item->pivot['price'] }}</td>
                    <td class="actions" data-th="">
                    </td>
                </tr>
                @endforeach
            
        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Total {{ $transaction->total}}</strong></td>
        </tr>
        <tr>
            <td><a href="{{ url('/home') }}" class="btn btn-warning">Kembali ke Daftar Pemesanan</a></td>
            <td class="hidden-xs"></td>
            <td class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total Rp. {{ $transaction->total }}</strong></td>
        </tr>
        </tfoot>
    </table>

@endsection