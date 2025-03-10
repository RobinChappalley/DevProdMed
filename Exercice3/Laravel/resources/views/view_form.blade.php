@extends('form_template')
@section('contenu')
    <form action="{{ url('traiteFormulaire') }}" method="post" , accept-charset="UTF-8">
        @csrf
        <label for="nom">Entrez votre nom : </label>
        <input name="nom" type="text" id="nom">
        <input type="submit" name="submit" value="Envoyer" />
    </form>
@endsection