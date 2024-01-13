<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Manuscript;

class Wizard extends Component
{
    public $currentStep = 1;
    public $user_id, $manuscript_id, $manu_type, $manu_title, $manu_file_type, $file;
    public $successMessage = '';

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        return view('livewire.wizard');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function firstStepSubmit()
    {
        $validatedData = $this->validate([
            'user_id' => 'required',
            'manuscript_id' => 'required',
            'manu_type' => 'required',
        ]);

        $this->currentStep = 2;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function secondStepSubmit()
    {
        $validatedData = $this->validate([
            'manu_title' => 'required',
            'manu_file_type' => 'required',
            'file' => 'file',
        ]);

        $this->currentStep = 3;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForm()
    {
        Manuscript::create([
            'user_id' => $this->user_id,
            'manuscript_id' => $this->manuscript_id,
            'manu_type' => $this->manu_type,
            'manu_title' => $this->manu_title,
            'manu_file_type' => $this->manu_file_type,
            'file' => $this->file,
        ]);

        $this->successMessage = 'Manuscript has been Created Successfully.';

        $this->clearForm();

        $this->currentStep = 1;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function back($step)
    {
        $this->currentStep = $step;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function clearForm()
    {
        $this->user_id = '';
        $this->manuscript_id = '';
        $this->manu_type = '';
        $this->manu_title = '';
        $this->manu_file_type = '';
        $this->file = '';
    }
}
