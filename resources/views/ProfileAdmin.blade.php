@extends('layout.Add')

@section('contents')
    <div class="flex justify-center py-6">
        <div class="w-full max-w-5xl">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <section class="bg-gray-100 py-6 px-4">
                    <nav aria-label="breadcrumb" class="bg-white p-3 rounded-lg shadow-md">
                        <ol class="breadcrumb flex space-x-2 text-gray-600">
                            <li class="breadcrumb-item font-semibold text-gray-700">Admin Profile</li>
                        </ol>
                    </nav>
                </section>
                
                <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white shadow-md rounded-lg p-6 text-center">
                        <img src="{{ asset('image/no-pic.png') ?? asset('images/default-avatar.png') }}" 
                            alt="avatar" 
                            class="rounded-full mx-auto mb-4 border-4 border-gray-300 w-32 h-32">
                        <h5 class="text-xl font-semibold text-gray-800">{{ $admin->firstName ?? 'No Name' }}</h5>
                        <p class="text-gray-600 text-sm">Admin</p>
                        <p class="text-gray-500 text-sm">{{ $admin->email ?? 'No Email' }}</p>
                    </div>
                    
                    <div class="col-span-2 bg-white shadow-md rounded-lg p-6">
                        <div class="space-y-4">
                            <div class="flex justify-between border-b pb-2">
                                <span class="font-medium text-gray-700">Admin Name</span>
                                <span class="text-gray-600">{{ $admin->firstName ?? 'No Name' }} {{ $admin->lastName ?? 'No Name' }}</span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span class="font-medium text-gray-700">Email</span>
                                <span class="text-gray-600">{{ $admin->email ?? 'No Email' }}</span>
                            </div>
                            <div class="flex justify-between border-b pb-2">
                                <span class="font-medium text-gray-700">Phone number</span>
                                <span class="text-gray-600">{{ $admin->phone ?? 'Not Provided' }}</span>
                            </div>
                        </div>
                        {{-- Uncomment if edit button is needed --}}
                        {{-- <div class="mt-4 text-right">
                            <a href="{{ route('admin.editProfile') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg shadow hover:bg-green-700">
                                <i class="fa fa-edit"></i> Edit Profile
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
