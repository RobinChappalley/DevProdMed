@extends('form_template')
@section('contenu')
    <h1>Liste des classes</h1>
    <ul>
        @foreach ($classList as $eleve)
            <li>{{ $eleve }}</li>
        @endforeach
    </ul>
@endsection