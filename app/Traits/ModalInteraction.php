<?php

namespace App\Traits;

use Livewire\Form;

trait ModalInteraction
{
    public function openModal(string $modalId): void
    {
        $this->dispatch('dialogCollapse', id: $modalId);

    }

    public function setActiveModal(string $modalId): void
    {
        session()->put('active_modal', $modalId);
    }
    public function getActiveModal(): string | null
    {
        return session()->get('active_modal');
    }

    public function setFailModalHook(Form $form, string $modalId)
    {
        $form->withValidator(function ($validator) use ($modalId) {
            if ($validator->fails()) {
                $this->openModal($modalId);
            }
        });
    }
}
