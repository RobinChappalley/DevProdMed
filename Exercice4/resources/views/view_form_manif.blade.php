@extends('template_contact')

@section('contenu')
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header bg-info text-white">Contactez-moi</div>
            <div class="card-body">
                <form method="POST" action="{{ url('manif') }}" accept-charset="UTF-8">
                    @csrf
                    <label for="start_date">Date de début de la manifestation</label>
                    <input type="date" name="start_date" id="">
                    <label for="end_date">Date de fin de la manifestation</label>
                    <input type="date" name="end_date" id="">

                    <label for="place">Lieu de la manifestation</label>
                    <input type="text" name="place" id="">
                    <button class="btn btn-info float-end" type="submit">Envoyer !</button>
                </form>
            </div>
        </div>
    </div>

@endsection