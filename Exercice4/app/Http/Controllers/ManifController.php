<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ContactRequest;
use Illuminate\Support\Facades\Mail;

class ManifController extends Controller
{


    public function rendFormulaire()
    {
        return view("view_form_manif");
    }

    public function valideEtTraiteFormulaire(ContactRequest $request)
    {
        Mail::send(
            'view_contenu_email_manif',
            $request->all(),
            function ($message) {
                $message->to('admin@example.com')
                    ->subject('Nouveau message via formulaire de contact');
            }
        );
        return view('view_confirmation_manif');
    }
}
