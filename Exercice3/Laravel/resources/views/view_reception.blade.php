@extends('form_template')
@section('contenu')
    <p>Les élèves sélectionnés sont :</p>
    <ul>
        @foreach ($classList as $eleve)
            <li>{{ $eleve }}</li>
        @endforeach
    </ul>
@endsection