@foreach($medicines as $m)
    <p>Name:{{ $m->generic_name }} Price:{{ $m->pivot->price }} Quantity:{{ $m->pivot->quantity }}</p>  
@endforeach