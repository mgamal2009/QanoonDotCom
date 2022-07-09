<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Client;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Clients extends Component
{
    use LivewireAlert;

    public $createFormVisible = false;
    public $editFormVisible = false;
    public $name, $email, $password, $rePassword, $mobileNumber, $gender, $birthdate, $accountType, $balance, $silverPoints, $goldPoints, $cv, $rowId;

    public function update()
    {
        $this->validate([
            'name' => 'required|max:65',
            'email' => 'required|max:255|unique:clients,email,' . $this->rowId,
            'mobileNumber' => 'required|max:15',
            'gender' => 'required|numeric',
            'birthdate' => 'required|date',
            'accountType' => 'required|numeric',
            'balance' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'silverPoints' => 'required|numeric',
            'goldPoints' => 'required|numeric',
        ]);
        Client::update([
            'name' => $this->name,
            'email' => $this->email,
            'gender' => $this->gender,
            'accountType' => $this->accountType,
            'birthDate' => $this->birthdate,
            'phoneNumber' => $this->mobileNumber,
            'balance' => $this->balance,
            'silverPoints' => $this->silverPoints,
            'goldPoints' => $this->goldPoints,
        ]);
        $this->alert('success', 'تم التعديل بنجاح', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
        ]);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|max:65',
            'email' => 'required|unique:clients|max:255',
            'password' => [
                'required',
                Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
            'rePassword' => 'required|same:password',
            'mobileNumber' => 'required|max:15',
            'gender' => 'required|numeric',
            'birthdate' => 'required|date',
            'accountType' => 'required|numeric',
        ]);
        Client::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'gender' => $this->gender,
            'accountType' => $this->accountType,
            'birthDate' => $this->birthdate,
            'phoneNumber' => $this->mobileNumber,
        ]);
        $this->alert('success', 'تم الإنشاء بنجاح', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
        ]);
        $this->hideModel();
    }

    public function hideModel()
    {
        $this->resetForm();
        $this->createFormVisible = false;
        $this->editFormVisible = false;
    }

    public function showEditModel($id)
    {
        $this->editFormVisible = true;
        $this->rowId = $id;
        $this->getData();

    }
    public function getData(){
        $row=Client::findOrFail($this->rowId);
        $this->name = $row->name;
        $this->email = $row->email;
        $this->mobileNumber = $row->phoneNumber;
        $this->gender = $row->gender;
        $this->birthdate = $row->birthdate;
        $this->accountType = $row->accountType;
        $this->balance = $row->balance;
        $this->silverPoints = $row->silverPoints;
        $this->goldPoints = $row->goldPoints;
        $this->cv = $row->cvFile;
    }

    public function createShowModel()
    {
        $this->createFormVisible = true;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->name = null;
        $this->email = null;
        $this->password = null;
        $this->rePassword = null;
        $this->mobileNumber = null;
        $this->gender = null;
        $this->birthdate = null;
        $this->accountType = null;
    }

    public function getClients()
    {
        return Client::orderBy('created_at', 'desc')->paginate(10);
    }

    public function render()
    {
        return view('livewire.dashboard.clients', [
            'allClients' => $this->getClients(),
        ]);
    }
}
