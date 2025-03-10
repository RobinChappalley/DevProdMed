@extends('form_template')
@section('contenu')
    <h1>Liste des classes</h1>
    <form action="{{ url('traiteListe') }}" method="post">
        @csrf
        <ul>
            @foreach ($classList as $eleve)
                <li>
                    <label for="{{ $eleve }}">{{ $eleve }}</label>
                    <!-- le fait de mettre name="classList[]" permet de mettre les éléments sélectionnés dans un tableau -->
                    <input type="checkbox" value="{{ $eleve }}" name="classList[]">{{ $eleve }}
                </li>
            @endforeach
        </ul>
        <input type="submit" value="Envoyer">
    </form>
@endsection