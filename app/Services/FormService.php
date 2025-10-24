<?php

namespace App\Services;

use App\Events\FormCreated;
use App\Models\Form;

class FormService
{
    public function contactUsForm(array $data): void
    {
        $form = Form::query()->create([
            'name' => $data['name'],
            'email' => $data['email'],
            'note' => $data['note'],
        ]);

        event(new FormCreated($form));
    }
}
