@extends('layouts.guest')
<title> @section('title', 'test') </title>
@section('content')
    <div class=" text-white border mx-auto bg-slate-600">
        todo bien {{ $nick }}
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
