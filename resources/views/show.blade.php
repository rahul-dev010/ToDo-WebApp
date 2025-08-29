<h1>
    show page
</h1>
@php( $i = 1)

@foreach ($bikes as $bike)
    <h3>{{$i++ }}{{ $bike->name }}</h3>
    <p>Model: {{ $bike->model }}</p>
    <p>Price: ₹{{ $bike->price }}</p>
@endforeach