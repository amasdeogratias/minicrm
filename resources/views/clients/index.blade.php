<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session("message"))
                        <div class="p-4 mb-4 text-center text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                            <span class="font-medium">{{ session('message') }}</span>
                        </div>
                    @endif
                    @if (session("error"))
                        <div class="p-4 mb-4 text-center text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-medium">{{ session('error') }}</span>
                        </div>
                    @endif
                    <a href="{{route('clients.create')}}" class="underline mb-">Add new Client</a>
                    <table class="w-full divide-y divide-gray-200 border mt-4">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span class="text-xs leading-4 font-medium text-gray-700">Sr. No</span>
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span class="text-xs leading-4 font-medium text-gray-700">Contact Name</span>
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span class="text-xs leading-4 font-medium text-gray-700">Contact Email</span>
                                </th>
                                <!-- <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span class="text-xs leading-4 font-medium text-gray-700">Contact Phone Number</span>
                                </th> -->
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span class="text-xs leading-4 font-medium text-gray-700">Company Name</span>
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span class="text-xs leading-4 font-medium text-gray-700">Company VAT</span>
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span class="text-xs leading-4 font-medium text-gray-700">Company Address</span>
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span class="text-xs leading-4 font-medium text-gray-700">Action</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($clients->count())
                            @php
                                $i=1;
                            @endphp
                                @foreach ($clients as $client)
                                    <tr>
                                        <td scope="row" class="px-6 py-3 bg-gray-50 text-left">
                                            <span class="font-normal text-gray-400">{{$i++}}</span>
                                        </td>
                                        <td class="px-6 py-3 bg-gray-50 text-left">
                                            <span class="font-normal text-gray-400">{{$client->contact_name}}</span>
                                        </td>
                                        <td class="px-6 py-3 bg-gray-50 text-left">
                                            <span class="font-normal text-gray-400">{{$client->contact_email}}</span>
                                        </td>
                                        <!-- <td class="px-6 py-3 bg-gray-50 text-left">
                                            <span class="font-normal text-gray-400">{{$client->contact_phone_number}}</span>
                                        </td> -->
                                        <td class="px-6 py-3 bg-gray-50 text-left">
                                            <span class="font-normal text-gray-400">{{$client->company_name}}</span>
                                        </td>
                                        <td class="px-6 py-3 bg-gray-50 text-left">
                                            <span class="font-normal text-gray-400">{{$client->company_vat}}</span>
                                        </td>
                                        <td class="px-6 py-3 bg-gray-50 text-left">
                                            <span class="font-normal text-gray-400">{{$client->company_address}}</span>
                                        </td>
                                        <td class="px-6 py-3 bg-gray-50 text-left">
                                            <span class="font-normal text-gray-400">{{$client->last_name}}</span>
                                        </td>
                                        <td class="px-6 py-3 bg-gray-50 text-left">
                                            <a href="{{route('clients.edit', $client)}}" class="underline">Edit</a>
                                            @can(\App\PermissionEnum::DELETE_CLIENTS->value) 
                                                |
                                                <form method="POST"
                                                    class="inline-block" 
                                                    action="{{ route('clients.destroy', $client) }}" 
                                                    onsubmit="return confirm('Are you sure you want to delete this client?')">
                                                    @method("DELETE")
                                                    @csrf
                                                    <button type="submit" class=" text-sm text-red-500 underline">Delete</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="px-6 py-3 bg-gray-50 text-left">
                                        <span class="font-normal text-gray-400">No users found</span>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{$clients->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
