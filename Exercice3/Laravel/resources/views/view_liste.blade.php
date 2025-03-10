@extends('form_template')
@section('contenu')
    <h1>Liste des classes</h1>
    <form action="{{ url('traiteListe') }}" method="post">
        @csrf
        <ul>
            @foreach ($classList as $eleve)
                <li>
                    <!-- le fait de mettre name="classList[]" permet de mettre les éléments sélectionnés dans un tableau -->
                    <input type="checkbox" value="{{ $eleve }}" name="classList[]">{{ $eleve }}
                </li>
            @endforeach
        </ul>

        Entrez une heure de début<input type="time" name="times[]" id="heureDebut">
        <br>
        Entrez une heure de fin <input type="time" name="times[]" id="heureFin">
        <br>
        Entrez la durée des intervalles entre les élèves <input type="time" name="times[]" id="duree">
        <br>

        <input type="submit" value="Envoyer">
    </form>
@endsection