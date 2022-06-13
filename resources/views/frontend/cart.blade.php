@extends('layouts.frontend')

@section('title', 'Cart')

@section('content')

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
            <?php $total = 0?>
            @if (session('cart'))
                @foreach (session('cart') as $id => $item)
                <?php $total += $item['price'] * $item['quantity']?>
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ asset('images/'.$item['photo']) }}" width="100" height="100" alt="..." class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $item['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">Rp. {{ $item['price'] }}</td>
                    <td data-th="Quantity">
                        {{ $item['quantity'] }}
                    </td>
                    <td data-th="Subtotal" class="text-center">Rp. {{ $item['price'] * $item['quantity'] }}</td>
                    <td class="actions" data-th="">
                    </td>
                </tr>
                @endforeach
            @endif
            
        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td class="text-center"><strong>Total {{ $total }}</strong></td>
        </tr>
        <tr>
            <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total Rp. {{ $total }}</strong><br>
                <a href="{{ url('/checkout') }}" class="btn btn-danger">Checkout</a>
            </td>
        </tr>
        </tfoot>
    </table>

@endsection