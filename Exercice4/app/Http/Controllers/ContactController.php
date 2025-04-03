<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ContactRequest;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{


    public function rendFormulaire()
    {
        return view("view_form_contact");
    }

    public function valideEtTraiteFormulaire(ContactRequest $request)
    {
        Mail::send(
            'view_contenu_email',
            $request->all(),
            function ($message) {
                $message->to('admin@example.com')
                    ->subject('Nouveau message via formulaire de contact');
            }
        );
        return view('view_confirmation');
    }
}
