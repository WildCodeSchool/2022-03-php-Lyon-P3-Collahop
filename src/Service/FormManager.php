<?php

namespace App\Service;

class FormManager
{
    public function incorrectMessage(string $message): bool|string
    {
        if (empty($message)) {
            return 'Veuillez écrire votre message';
        } elseif (strlen($message) < 10) {
            return 'Votre message doit contenir au moins 10 caractères';
        } elseif (strlen($message) > 1000) {
            return 'Votre message est trop long ; il ne doit pas dépasser 1000 caractères';
        } else {
            return false;
        }
    }
}
