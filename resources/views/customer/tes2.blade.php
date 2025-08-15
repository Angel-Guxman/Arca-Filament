@extends('layouts.guest')
<title> @section('title', 'test') </title>
@section('content')
    <div class="mx-auto border bg-slate-600 text-white">
        <form action="{{ route('prueba-post-2') }}" method="POST">
            formulario 2 {{ $apellido }}
            @csrf
            <input value="angel" class="text-black" type="text" name="nick">

            <button type="submit">Probar

            </button>


        </form>
        @if ($errors->any())
            <div class="bg-red-500 text-white">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>
            </div>
        @endif

    </div>
@endsection
