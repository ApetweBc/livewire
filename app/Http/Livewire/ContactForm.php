<?php

namespace App\Http\Livewire;

use App\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public $firstname;
    public $lastname;
    public $email;
    public $phone;
    public $message;


    protected $rules = [
        'firstname' => 'required|min:3',
        'lastname' => 'required|min:3',
         'email' => 'required|email',
         'phone' => 'required',
         'message' => 'required|min:5',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        $contacts = $this->validate();


        $contacts['firstname'] = $this->firstname;
        $contacts['lastname'] = $this->lastname;
        $contacts['email'] = $this->email;
        $contacts['phone'] = $this->phone;
        $contacts['message'] = $this->message;

        //   dd($contacts);


        Mail::to('webdev@protecdental.com')->send(new ContactMailable($contacts));

        $this->resetForm();
        session()->flash('success_message', 'Your message is received successfully');
    }

    private function resetForm()
    {
        $this->firstname = '';
        $this->lastname = '';
        $this->email = '';
        $this->phone = '';
        $this->message = '';
    }



    public function render()
    {
        return view('livewire.contact-form');
    }
}
