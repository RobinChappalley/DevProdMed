@extends('form_template')
@section('contenu')
    <p>Voici votre planning de rendez-vous de la journée ! </p>
    <table>
        @for ($i = 0; $i < count($eleves); $i++)
            <tr>
                <td>{{ $eleves[$i] }} </td>
                <td>{{ $tableauheures[$i][0] }} </td>
                <td>{{ $tableauheures[$i][1] }}</td>
            </tr>
        @endfor
    </table>
@endsection