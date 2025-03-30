@extends('form_template')
@section('contenu')
    <p>Voici votre planning de rendez-vous de la journée ! :</p>
    <ul>
        @foreach ($eleves as $eleve)
            <li>{{ $eleve }} :
                @foreach ($tableauheures as $horaire)
                    {{ $horaire[0]}} <br> - {{ $horaire[1]}}
                    <br>
                @endforeach
            </li>
        @endforeach
    </ul>
@endsection