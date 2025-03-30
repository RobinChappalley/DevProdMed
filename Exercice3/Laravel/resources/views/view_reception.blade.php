@extends('form_template')
@section('contenu')
    <p>Les élèves sélectionnés sont :</p>
    <ul>
        @foreach ($eleves as $eleve)
            <li>{{ $eleve }}</li>
        @endforeach
    </ul>
@endsection