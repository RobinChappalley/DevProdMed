@extends('monTemplate')

@section('titre')
    Proverbes
@endsection

@section('contenu')
    @foreach ($proverbes as $proverbe)
        <p>{{ $proverbe }}</p>
    @endforeach
@endsection