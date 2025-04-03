<?php
namespace App\Http\Controllers;
use Illuminate\Foundation\Http\FormRequest;
class ContactRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à faire cette requête.
     */
    public function authorize(): bool
    {
        return true; // Par défaut, l'accès est refusé.
    }
    /**
     * Définit les règles de validation des champs du formulaire.
     */
    public function rules(): array
    {
        return [
            'nom' => 'bail|required|min:3|max:20|alpha',
            'email' => 'required|email',
            'texte' => 'required|max:250'
        ];
        // · bail : Arrête la validation dès la première erreur pour un champ.
// • required : Le champ est obligatoire.
// • min:3 : Le champ nom doit contenir au moins 3 caractères.
// • max:20 : Le champ nom ne peut pas dépasser 20 caractères.
// • alpha : Le champ nom ne doit contenir que des lettres.
// • email : Vérifie que le champ email contient une adresse valide.
// • max:250 : Le champ texte est limité à 250 caractères.
    }
}