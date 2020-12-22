<div class="flex flex-col mt-8">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div class="max-w-lg w-full lg:max-w-xs">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input id="search" wire:model.debounce.200ms="search"
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:border-blue-300 focus:shadow-outline-blue sm:text-sm transition duration-150 ease-in-out"
                            placeholder="Search" type="search">
                    </div>
                </div>
                <div class="relative flex items-start">
                    <div class="flex items-center h-5">
                        <input wire:model="active" id="active" type="checkbox"
                            class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                    </div>
                    <div class="ml-3 text-sm leading-5">
                        <label for="active" class="font-medium text-gray-700">Active?</label>
                    </div>
                </div>
            </div>

            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mt-4">

                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                id
                            </th>
                            <th class="px-6 py-3 text-left">
                               <div class="flex items-center">
                                   <button wire:click="sortBy('FullName')" class="bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                           First Name
                                   </button>
                                    @if ($sortField !== 'FullName')
                                    <span></span>
                                    @elseif($sortAsc)
                                    <svg class="ml-2 w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
                                      </svg>
                                    @else
                                    <svg class="ml-2 w-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                      </svg>

                                    @endif
                            </th>
                            <th
                                class="px-6 py-3 ">
                                <div class="flex items-center">
                                    <button wire:click="sortBy('FullName')" class="bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Last Name
                                    </button>

                            </th>
                            <th
                            class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                             Address
                            </th>
                            <th
                            class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                             City
                            </th>
                            <th
                                class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-3 bg-gray-50">
                                Active
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($scotlists as $scotlist)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full"
                                    src="{{asset('/images/profile.JPG')}}" width="100%" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm leading-5 font-medium text-gray-900">
                                            {{ $scotlist->id }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-sm leading-5 text-gray-900">{{ $scotlist->FirstName }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-sm leading-5 text-gray-900">{{ $scotlist->LastName }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-sm leading-5 text-gray-900">{{ $scotlist->Address }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                <div class="text-sm leading-5 text-gray-900">{{ $scotlist->City}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap">
                                @if ($scotlist->Speciality)
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                   {{ $scotlist->Speciality}}
                                </span>
                                {{-- <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-red-100 text-red-800">
                                            Inactive
                                        </span> --}}
                                @else
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-red-100 text-red-800">
                                   No Title
                                </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                @if ($scotlist->active)
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                  Active

                                @else
                                <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-red-100 text-red-800">
                                 No Active
                                </span>

                                @endif

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-8">
                {{ $scotlists->links() }}
            </div>
        </div>
    </div>
    <div class="h-96"></div>
</div>
