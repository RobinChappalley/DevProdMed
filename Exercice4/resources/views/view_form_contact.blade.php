@extends('template_contact')

@section('contenu')
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header bg-info text-white">Contactez-moi</div>
            <div class="card-body">
                <form method="POST" action="{{ url('contact') }}" accept-charset="UTF-8">
                    @csrf
                    <div class="mb-3">
                        <input class="form-control {{ $errors->has('nom') ?
        'is-invalid' : '' }}" ,→ placeholder="Votre nom" name="nom" type="text" value="{{ old('nom') }}">
                        {!! $errors->first(
        'nom',
        '<div class="invalid-feedback">:message</div>'
    ) !!}
                    </div>
                    <div class="mb-3">
                        <input class="form-control {{ $errors->has('email') ?
        'is-invalid' : '' }}" ,→ placeholder="Votre email" name="email" type="email" value="{{ old('email') }}">
                        {!! $errors->first(
        'email',
        '<div class="invalid-feedback">:message</div>'
    ) !!}
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control {{ $errors->has('texte')
        ? 'is-invalid' : '' }}" ,→ placeholder="Votre message" name="texte" rows="4">{{ old('texte') }}</textarea>
                        {!! $errors->first(
        'texte',
        '<div class="invalid-feedback">:message</div>'
    ) !!}
                    </div>
                    <button class="btn btn-info float-end" ,→ type="submit">Envoyer !</button>
                </form>
            </div>
        </div>
    </div>

@endsection