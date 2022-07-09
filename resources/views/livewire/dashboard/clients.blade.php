<div>
    @section('pageName')
        <a class="text-white text-sm uppercase hidden lg:inline-block font-semibold" href="{{route('clients')}}">
            Clients
        </a>
    @endsection
    <div class="px-4 md:px-10 mx-auto w-full -m-24">
        <div class="flex flex-wrap mt-4">
            <div class="w-full mb-12 px-4">
                <div
                    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded bg-white"
                >
                    <div class="rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <div
                                class="relative w-full px-4 max-w-full flex-grow flex-1"
                            >
                                <h3 class="font-semibold text-lg text-blueGray-700">
                                    Clients Table
                                </h3>
                                <button wire:click="createShowModel">
                                    Add Client
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="block w-full overflow-x-auto">
                        <!-- Projects table -->
                        <table
                            class="items-center w-full bg-transparent border-collapse"
                        >
                            <thead>
                            <tr>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                                >
                                    Name
                                </th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                                >
                                    Email
                                </th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                                >
                                    Account Type
                                </th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                                >
                                    Authenticated
                                </th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                                >
                                    Created At
                                </th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100"
                                ></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($allClients as $client)
                                <tr>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                    >
                                        {{$client->name}}
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                    >
                                        {{$client->email}}
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                    >
                                        @if($client->accountType==0)
                                            مشترك
                                        @elseif($client->accountType==1)
                                            محاضر
                                        @elseif($client->accountType==2)
                                            شركة تدريب
                                        @elseif($client->accountType==3)
                                            كاتب
                                        @elseif($client->accountType==4)
                                            دار نشر
                                        @elseif($client->accountType==5)
                                            محامي
                                        @endif

                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                    >
                                        @if($client->authenticate==0)
                                            غير موثق
                                        @else
                                            موثق
                                        @endif

                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                                    >
                                        {{date('d-m-Y', strtotime($client->created_at))}}
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right">
                                        <a
                                            class="text-blueGray-500 block py-1 px-3"
                                            onclick="openDropdown(event,'table-light-1-dropdown')">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div
                                            class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                                            id="table-light-1-dropdown">
                                            <a
                                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                                                wire:click="showEditModel({{$client->id}})"
                                            >Edit</a>
                                            <a
                                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                                            >Delete</a>
                                            <a
                                                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700"
                                            >Authenticate</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="createFormVisible">
        <x-slot name="title">
            Add Client
        </x-slot>
        <x-slot name="content">
            <hr style="border-color:#000 !important">
            <div class="mt-4">
                <x-jet-label for='name' value="Name"/>
                <x-jet-input type='text' id="name" wire:model='name' class="block mt-1 w-full"/>
                @error('name')
                <span class="text-red-500 mt-1">{{$message}}</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for='email' value="Email"/>
                <x-jet-input type='email' id="email" wire:model='email' class="block mt-1 w-full"/>
                @error('email')
                <span class="text-red-500 mt-1">{{$message}}</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for='password' value="Password"/>
                <x-jet-input type='password' id="password" wire:model='password' class="block mt-1 w-full"/>
                @error('password')
                <span class="text-red-500 mt-1">{{$message}}</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for='rePassword' value="Confirm Password"/>
                <x-jet-input type='password' id="rePassword" wire:model='rePassword' class="block mt-1 w-full"/>
                @error('rePassword')
                <span class="text-red-500 mt-1">{{$message}}</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for='mobileNumber' value="Mobile Number"/>
                <x-jet-input type='text' id="mobileNumber" wire:model='mobileNumber' class="block mt-1 w-full"/>
                @error('mobileNumber')
                <span class="text-red-500 mt-1">{{$message}}</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for='gender' value="Gender"/>
                <label>
                    <select id="gender" wire:model='gender'
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="0">
                            Male
                        </option>
                        <option value="1">
                            Female
                        </option>
                    </select>
                </label>
                @error('gender')
                <span class="text-red-500 mt-1">{{$message}}</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for='birthdate' value="Birth Date"/>
                <x-jet-input type='date' id="birthdate" wire:model='birthdate' class="block mt-1 w-full"/>
                @error('birthdate')
                <span class="text-red-500 mt-1">{{$message}}</span>
                @enderror
            </div>
            <div class="mt-4">
                <x-jet-label for='accountType' value="Account Type"/>
                <label>
                    <select id="accountType" wire:model='accountType'
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="0">
                            مشترك
                        </option>
                        <option value="1">
                            محاضر
                        </option>
                        <option value="2">
                            شركة تدريب
                        </option>
                        <option value="3">
                            كاتب
                        </option>
                        <option value="4">
                            دار نشر
                        </option>
                        <option value="5">
                            محامي
                        </option>
                    </select>
                </label>
                @error('accountType')
                <span class="text-red-500 mt-1">{{$message}}</span>
                @enderror
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-jet-button wire:click='store' class="ml-2 main-btn">
                <i class="fas fa-plus mr-1"></i> Add
            </x-jet-button>
            <x-jet-button wire:click='hideModel' class="ml-2">
                <i class="fas fa-times mr-1"></i> Cancel
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
        <x-jet-dialog-modal wire:model="editFormVisible">
            <x-slot name="title">
                Edit Client
            </x-slot>
            <x-slot name="content">
                <hr style="border-color:#000 !important">
                <div class="mt-4">
                    <x-jet-label for='name' value="Name"/>
                    <x-jet-input type='text' id="name" wire:model='name' class="block mt-1 w-full"/>
                    @error('name')
                    <span class="text-red-500 mt-1">{{$message}}</span>
                    @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for='email' value="Email"/>
                    <x-jet-input type='email' id="email" wire:model='email' class="block mt-1 w-full"/>
                    @error('email')
                    <span class="text-red-500 mt-1">{{$message}}</span>
                    @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for='mobileNumber' value="Mobile Number"/>
                    <x-jet-input type='text' id="mobileNumber" wire:model='mobileNumber' class="block mt-1 w-full"/>
                    @error('mobileNumber')
                    <span class="text-red-500 mt-1">{{$message}}</span>
                    @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for='gender' value="Gender"/>
                    <label>
                        <select id="gender" wire:model='gender'
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="0">
                                Male
                            </option>
                            <option value="1">
                                Female
                            </option>
                        </select>
                    </label>
                    @error('gender')
                    <span class="text-red-500 mt-1">{{$message}}</span>
                    @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for='birthdate' value="Birth Date"/>
                    <x-jet-input type='date' id="birthdate" wire:model='birthdate' class="block mt-1 w-full"/>
                    @error('birthdate')
                    <span class="text-red-500 mt-1">{{$message}}</span>
                    @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for='accountType' value="Account Type"/>
                    <label>
                        <select id="accountType" wire:model='accountType'
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="0">
                                مشترك
                            </option>
                            <option value="1">
                                محاضر
                            </option>
                            <option value="2">
                                شركة تدريب
                            </option>
                            <option value="3">
                                كاتب
                            </option>
                            <option value="4">
                                دار نشر
                            </option>
                            <option value="5">
                                محامي
                            </option>
                        </select>
                    </label>
                    @error('accountType')
                    <span class="text-red-500 mt-1">{{$message}}</span>
                    @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for='balance' value="Balance"/>
                    <x-jet-input type='text' id="balance" wire:model='balance' class="block mt-1 w-full"/>
                    @error('balance')
                    <span class="text-red-500 mt-1">{{$message}}</span>
                    @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for='silverPoints' value="Silver Points"/>
                    <x-jet-input type='number' id="silverPoints" wire:model='silverPoints' class="block mt-1 w-full"/>
                    @error('silverPoints')
                    <span class="text-red-500 mt-1">{{$message}}</span>
                    @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for='goldPoints' value="goldPoints"/>
                    <x-jet-input type='number' id="goldPoints" wire:model='goldPoints' class="block mt-1 w-full"/>
                    @error('goldPoints')
                    <span class="text-red-500 mt-1">{{$message}}</span>
                    @enderror
                </div>
                <div class="mt-4">
                    <x-jet-label for='cv' value="CV"/>
                    <x-jet-label value=" {{($cv == null ? 'ليس لديه سيرة ذاتية' : 'لديه سيرة ذاتية')}} " class="block mt-1 w-full"/>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-button wire:click='update' class="ml-2 main-btn">
                    <i class="fas fa-save mr-1"></i> Update
                </x-jet-button>
                <x-jet-button wire:click='hideModel' class="ml-2">
                    <i class="fas fa-times mr-1"></i> Cancel
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
</div>
