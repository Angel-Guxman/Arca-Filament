@extends('layouts.customer')
@section('content')
    <x-customer.cart :$cart :$cartItems :$shipping :$totalItems :$total>

    </x-customer.cart>
@endsection
