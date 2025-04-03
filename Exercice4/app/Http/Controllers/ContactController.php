<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{


    public function rendFormulaire()
    {
        return view("view_form_contact");
    }
}
