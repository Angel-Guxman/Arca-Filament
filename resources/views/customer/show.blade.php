@extends('layouts.customer')

@section('content')
    <div class="category-container">
        <h1>{{ $category->name }}</h1>

        <div class="products-list">
            @foreach ($products as $product)
                @if ($category->name == 'Aretes')
                    @include('customer.earrings', ['product' => $product])
                @elseif ($category->name == 'Collares')
                    @include('customer.necklaces', ['product' => $product])
                @elseif ($category->name == 'Pulseras')
                    @include('customer.bracelets', ['product' => $product])
                @endif
            @endforeach
        </div>
    </div>
@endsection
