@extends('form_template')
@section('contenu')
    <p>Voici votre planning de rendez-vous de la journée ! :</p>
    <p>Horaires des rendez-vous :</p>
    <ul>
        @for ($i = 0; $i < count($eleves); $i++)
            <li>{{ $eleves[$i] }} : {{ $tableauheures[$i][0] }} - {{ $tableauheures[$i][1] }}</li>
        @endfor
    </ul>

@endsection