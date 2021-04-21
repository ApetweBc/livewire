<form action="{{'/contacts'}}" wire:submit.prevent='submitForm' method="POST">
    @csrf
    <div class="grid grid-cols-2 m-10 gap-4">
        <div class="absolute center m-0 m-auto bg-gray-800 w-full h-auto ">
            <svg wire:loading wire:target='submitForm' class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
        </div>

        @if(session('success_message'))
        <span class="text-green-500">{{session('success_message')}}</span>

        @endif


        <div>
            <input type="text" wire:model.lazy="firstname" name="first_name" class="w-full border border-solid pl-3"
                placeholder="first name">
            @error('firstname')
            <div class="text-red-500">{{$message}} </div>
            @enderror
        </div>
        <div>
            <input type="text" wire:model.lazy="lastname" name="last_name" class="w-full border border-solid pl-3"
                placeholder="last name">
            @error('lastname')
            <div class="text-red-500">{{$message}} </div>
            @enderror
        </div>
        <div>
            <input type="email" wire:model.lazy="email" name="email" class="w-full border border-solid pl-3"
                placeholder="email">
            @error('email')
            <div class="text-red-500">{{$message}} </div>
            @enderror
        </div>
        <div>
            <input type="text" wire:model.lazy="phone" name="phone" class="w-full border border-solid pl-3"
                placeholder="telephone">
            @error('phone')
            <div class="text-red-500">{{$message}} </div>
            @enderror
        </div>

        <div>
            <textarea wire:model.lazy="message" name="message" id="" cols="30" rows="10"
                class="w-full border border-solid pl-3"></textarea>
            @error('message')
            <div class="text-red-500">{{$message}} </div>
            @enderror
        </div>


        <div>
            {{-- <input type="submit" value="Submit" class="w-full border border-solid pl-3 bg-green-900 text-white disabled "> --}}


            <button type="submit" value="Submit"
                class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150 cursor-not-allowed">
                <svg wire:loading wire:target='submitForm' class="animate-spin -ml-1 mr-3 h-5 w-5 text-white"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Submit
            </button>
        </div>

    </div>

</form>
