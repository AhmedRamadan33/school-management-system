<?php

namespace App\Http\Livewire\Parent;

use App\Models\BloodGroup;
use App\Models\Image;
use App\Models\MyParent;
use App\Models\Nationalitie;
use App\Models\Religion;
use App\Traits\UploadFilesTrait;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads, UploadFilesTrait;
    public $Nationalities, $Type_Bloods, $Religions, $my_parents, $successMessage = '';
    public $updateMode = false, $photos, $show_table = true, $parent_id;
    public $currentStep = 1,

        // Father_INPUTS
        $email, $password,
        $father_name, $father_national_id, $father_phone,
        $father_job, $father_address, $father_religion,
        $father_nationality, $father_bloodGroup,

        // Mother_INPUTS
        $mother_name, $mother_national_id, $mother_phone,
        $mother_job, $mother_address, $mother_religion,
        $mother_nationality, $mother_bloodGroup;

    public function mount()
    {
        $this->Nationalities = Nationalitie::all();
        $this->Type_Bloods  = BloodGroup::all();
        $this->Religions  = Religion::all();
        $this->my_parents  = MyParent::all();
    }

    public function render()
    {
        return view('livewire.parent.create');
    }

    public function showform()
    {
        $this->show_table = false;
    }

    //firstStepSubmit
    public function firstStepSubmit()
    {
        $this->validate([
            'email' => 'required|email|unique:parents,email,' . $this->id,
            'password' => 'required',
            'father_name' => 'required',
            'father_job' => 'required',
            'father_national_id' => 'required|unique:parents,father_national_id,' . $this->id,
            'father_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'father_nationality' => 'required',
            'father_bloodGroup' => 'required',
            'father_religion' => 'required',
            'father_address' => 'required',
        ]);

        $this->currentStep = 2;
    }

    //secondStepSubmit
    public function secondStepSubmit()
    {

        $this->validate([
            'mother_name' => 'required',
            'mother_national_id' => 'required|unique:parents,mother_national_id,' . $this->id,
            'mother_phone' => 'required',
            'mother_job' => 'required',
            'mother_nationality' => 'required',
            'mother_bloodGroup' => 'required',
            'mother_religion' => 'required',
            'mother_address' => 'required',
        ]);
        $this->currentStep = 3;
    }


    public function save()
    {
        $My_Parent = new MyParent();
        // Father_INPUTS
        $My_Parent->email = $this->email;
        $My_Parent->Password = Hash::make($this->password);
        $My_Parent->father_name = $this->father_name;
        $My_Parent->father_national_id = $this->father_national_id;
        $My_Parent->father_phone = $this->father_phone;
        $My_Parent->father_job = $this->father_job;
        $My_Parent->father_nationality = $this->father_nationality;
        $My_Parent->father_bloodGroup = $this->father_bloodGroup;
        $My_Parent->father_religion = $this->father_religion;
        $My_Parent->father_address = $this->father_address;

        // Mother_INPUTS
        $My_Parent->mother_name = $this->mother_name;
        $My_Parent->mother_national_id = $this->mother_national_id;
        $My_Parent->mother_phone = $this->mother_phone;
        $My_Parent->mother_job = $this->mother_job;
        $My_Parent->mother_nationality = $this->mother_nationality;
        $My_Parent->mother_bloodGroup = $this->mother_bloodGroup;
        $My_Parent->mother_religion = $this->mother_religion;
        $My_Parent->mother_address = $this->mother_address;
        $My_Parent->save();

        $this->storeImage('parents/', $this->photos, $My_Parent->id, 'App\Models\MyParent');

        $this->successMessage = 'Added Successfully';
        $this->clearForm();
        $this->currentStep = 1;
    }


    public function edit($id)
    {
        $this->show_table = false;
        $this->updateMode = true;
        $My_Parent = MyParent::where('id', $id)->first();
        $this->parent_id = $id;
        $this->email = $My_Parent->email;
        // $this->password = $My_Parent->password;
        $this->father_name = $My_Parent->father_name;
        $this->father_job = $My_Parent->father_job;
        $this->father_national_id = $My_Parent->father_national_id;
        $this->father_phone = $My_Parent->father_phone;
        $this->father_nationality = $My_Parent->father_nationality;
        $this->father_bloodGroup = $My_Parent->father_bloodGroup;
        $this->father_address = $My_Parent->father_address;
        $this->father_religion = $My_Parent->father_religion;

        $this->mother_name = $My_Parent->mother_name;
        $this->mother_job = $My_Parent->mother_job;
        $this->mother_national_id = $My_Parent->mother_national_id;
        $this->mother_phone = $My_Parent->mother_phone;
        $this->mother_nationality = $My_Parent->mother_nationality;
        $this->mother_bloodGroup = $My_Parent->mother_bloodGroup;
        $this->mother_address = $My_Parent->mother_address;
        $this->mother_religion = $My_Parent->mother_religion;
    }


    //firstStepSubmit
    public function firstStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 2;
    }

    //secondStepSubmit_edit
    public function secondStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 3;
    }

    public function submitForm_edit()
    {

        if ($this->parent_id) {
            $parent = MyParent::find($this->parent_id);
            $parent->update([
                // Father_INPUTS
                'email' => $this->email,
                // 'password' => Hash::make($this->password),
                'father_name' => $this->father_name,
                'father_national_id' => $this->father_national_id,
                'father_phone' => $this->father_phone,
                'father_job' => $this->father_job,
                'father_nationality' => $this->father_nationality,
                'father_bloodGroup' => $this->father_bloodGroup,
                'father_religion' => $this->father_religion,
                'father_address' => $this->father_address,

                // Mother_INPUTS
                'mother_name' => $this->mother_name,
                'mother_national_id' => $this->mother_national_id,
                'mother_phone' => $this->mother_phone,
                'mother_job' => $this->mother_job,
                'mother_nationality' => $this->mother_nationality,
                'mother_bloodGroup' => $this->mother_bloodGroup,
                'mother_religion' => $this->mother_religion,
                'mother_address' => $this->mother_address,
            ]);
        }
        $this->storeImage('parents/', $this->photos, $this->parent_id, 'App\Models\MyParent');

        toastr()->success('Updated Successfully');
        return redirect()->route('parents.index');
    }

    //clearForm
    public function clearForm()
    {
        $this->email = '';
        $this->password = '';
        $this->father_name = '';
        $this->father_job = '';
        $this->father_national_id = '';
        $this->father_phone = '';
        $this->father_nationality = '';
        $this->father_bloodGroup = '';
        $this->father_address = '';
        $this->father_religion = '';

        $this->mother_name = '';
        $this->mother_job = '';
        $this->mother_national_id = '';
        $this->mother_phone = '';
        $this->mother_nationality = '';
        $this->mother_bloodGroup = '';
        $this->mother_address = '';
        $this->mother_religion = '';
    }

    //back
    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function delete($id)
    {
        $parent = MyParent::findOrFail($id);
        $this->deleteImage($id,'parents/','App\Models\MyParent');
        $parent->delete();
        return redirect()->route('parents.index');
    }


    // Real-time Validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'email' => 'required|email|unique:parents,email,' . $this->id,
            'father_national_id' => 'required|unique:parents,father_national_id,' . $this->id,
            'father_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'mother_national_id' => 'required|unique:parents,mother_national_id,' . $this->id,
            'mother_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);
    }
}
