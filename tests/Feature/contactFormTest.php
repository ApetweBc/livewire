<?php

namespace Tests\Feature;

use App\Http\Livewire\ContactForm;
use App\Mail\ContactMailable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Tests\TestCase;

class Example2Test extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->get('/')
        ->assertSeeLivewire('contact-form');
    }


    public function testForEmailTest (){

        Mail::fake();

        Livewire::test(ContactForm::class)
        ->set('firstname', 'Francis')
        ->set('lastname', 'James')
        ->set('email', 'someguy@gmail.com')
        ->set('phone', '8765545466')
        ->set('message', 'Testing')
        ->call('submitForm')
        ->assertSee('Your message is received successfully');

        Mail::assertSent(function (ContactMailable $mail ){

           $mail->build();

           return $mail->hasTo('webdev@protecdental.com') &&
           $mail->hasFrom('someguy@gmail.com') &&
           $mail->subject ('Contact Mailable');


        });

    }



    // public function testForValidationTest (){

    //     // Mail::fake();

    //     Livewire::test(ContactForm::class)
    //     ->set('firstname', 'Francis')
    //     ->set('lastname', 'James')
    //     ->set('email', 'someguy@gmail.com')
    //     ->set('phone', '8765545466')
    //     ->set('message', 'Testing')
    //     ->call('submitForm')
    //     ->assertHasErrors(['firstname' => 'required']);



    // }
}
