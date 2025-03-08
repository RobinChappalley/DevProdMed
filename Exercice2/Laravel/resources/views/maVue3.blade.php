@extends('monTemplate')
@section('titre')
    Ma belle image
@endsection
@section('contenu')
    <p>
        Voici ma première image :<br><br>
        <img src="{{ asset('storage/images/image.png') }}" alt="Mon image" />
    </p>
@endsection