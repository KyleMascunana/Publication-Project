<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Author;
use App\Helpers\Helper;
use Livewire\Component;
use App\Models\Manuscript;
use Livewire\WithFileUploads;

class MultiStepForm extends Component
{

    use WithFileUploads;

    public $paginationTheme = 'bootstrap';
    public $user_id;
    public $manuscript_id;
    public $manu_type;
    public $manu_title;
    public $manu_file_type;
    public $file;
    public $manu_abstract;
    public $au_id;
    public $au_fname;
    public $au_lname;
    public $au_affiliation;
    public $cover_letter;


    public $totalSteps = 4;
    public $currentStep = 1;

    public function mount(){
        $this->currentStep = 1;
    }

    public function increaseStep(){
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep(){
        $this->resetErrorBag();
        $this->currentStep--;
        if($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }

    public function validateData(){
        if($this->currentStep == 1){
            $this->validate([
                'au_fname'=>'required|string',
                'au_lname'=>'required|string',
                'au_affiliation'=>'required|string'
            ]);
        }
        elseif($this->currentStep == 2){
            $this->validate([
                'cover_letter'=>'required|string',
            ]);
        }
        elseif($this->currentStep == 3){
            $this->validate([
                'manu_type'=>'required|string',
                'manu_title'=>'required|string',
                'manu_file_type'=>'required|string'
            ]);
        }
    }

    public function manuscript(){
        $this->resetErrorBag();
        if($this->currentStep == 4){
            $this->validate([
                'file' => 'required|mimes:doc,docx,pdf|max:50000',
                'manu_abstract' => 'required|string'
            ]);
        }

        $filename = time().'.'.$this->file->getClientOriginalExtension();
        $upload_file = $this->file->storeAs('storages', $filename);

        $user_id = auth()->user()->id;
        $manuscript_id = Helper::IDGenerator(new Manuscript, 'manuscript_id', 5, 'JEAR');

        if($upload_file){
            $values = array(
                "user_id"=>$this->user_id = $user_id,
                "manuscript_id"=>$this->manuscript_id = $manuscript_id,
                "manu_type"=>$this->manu_type,
                "manu_title"=>$this->manu_title,
                "manu_file_type"=>$this->manu_file_type,
                "file"=>$filename,
                "manu_abstract"=>$this->manu_abstract,
                "au_fname"=>$this->au_fname,
                "au_lname"=>$this->au_lname,
                "au_affiliation"=>$this->au_affiliation,
                "cover_letter"=>$this->cover_letter,

            );

            Manuscript::insert($values);
            $this->reset();
            $this->currentStep = 1;

            return to_route('author.manuscripts.index')->with('message', 'Manuscript has been Uploaded Successfully!');
        }

    }


    public function render()
    {
        return view('livewire.multi-step-form');
    }
}
