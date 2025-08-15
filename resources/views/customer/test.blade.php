@extends('layouts.guest')
<title> @section('title', 'test') </title>
@section('content')
    <div class=" text-white border mx-auto bg-slate-300">
        <form action="{{ route('prueba-post') }}" method="POST">
            @csrf
            <input value="guzman" class=" text-black" type="text" name="apellido">
            <button type="submit">Probar</button>
        </form>
        @if ($errors->any())
            <div class=" text-white bg-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
@endsection
