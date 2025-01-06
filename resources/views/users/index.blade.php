<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
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
                    <a href="{{route('users.create')}}" class="underline mb-">Add new User</a>
                    <table class="w-full divide-y divide-gray-200 border">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span class="text-xs leading-4 font-medium text-gray-700">Sr. No</span>
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span class="text-xs leading-4 font-medium text-gray-700">First Name</span>
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span class="text-xs leading-4 font-medium text-gray-700">Last Name</span>
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span class="text-xs leading-4 font-medium text-gray-700">E-mail ID</span>
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left">
                                    <span class="text-xs leading-4 font-medium text-gray-700">Action</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($users->count())
                            @php
                                $i=1;
                            @endphp
                                @foreach ($users as $user)
                                    <tr>
                                        <td scope="row" class="px-6 py-3 bg-gray-50 text-left">
                                            <span class="font-normal text-gray-400">{{$i++}}</span>
                                        </td>
                                        <td class="px-6 py-3 bg-gray-50 text-left">
                                            <span class="font-normal text-gray-400">{{$user->first_name}}</span>
                                        </td>
                                        <td class="px-6 py-3 bg-gray-50 text-left">
                                            <span class="font-normal text-gray-400">{{$user->last_name}}</span>
                                        </td>
                                        <td class="px-6 py-3 bg-gray-50 text-left">
                                            <span class="font-normal text-gray-400">{{$user->email}}</span>
                                        </td>
                                        <td>
                                            <a href="{{route('users.edit', $user)}}">Edit</a>
                                            <form method="POST"
                                                class="inline-block" 
                                                action="{{ route('users.destroy', $user) }}" 
                                                onsubmit="return confirm('Are you sure you want to delete this user?')">
                                                @method("DELETE")
                                                @csrf
                                                <button type="submit" class=" text-sm text-red-500 underline">Delete</button>
                                            </form>
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
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
