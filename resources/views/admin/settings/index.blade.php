@extends('layouts.admin')

@section('header', 'Global Settings')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 border border-gray-200 dark:border-gray-700">
        <p class="text-gray-600 dark:text-gray-400 mb-6">Manage global application settings. These changes affect the entire system.</p>
        
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 border border-green-200 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            
            <div class="space-y-6">
                <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-750 rounded-lg border border-gray-100 dark:border-gray-700">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">User Registration</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Allow new users to register an account.</p>
                    </div>
                    <div class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                        <input type="checkbox" name="user_registration" id="user_registration" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" {{ ($settings['user_registration'] ?? '0') == '1' ? 'checked' : '' }}/>
                        <label for="user_registration" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                    </div>
                </div>

                <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-750 rounded-lg border border-gray-100 dark:border-gray-700">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">Email Verification</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Require users to verify their email address before accessing the dashboard.</p>
                    </div>
                    <div class="relative inline-block w-12 mr-2 align-middle select-none transition duration-200 ease-in">
                        <input type="checkbox" name="email_verification" id="email_verification" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer" {{ ($settings['email_verification'] ?? '0') == '1' ? 'checked' : '' }}/>
                        <label for="email_verification" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                    </div>
                </div>
            </div>

            <div class="flex justify-end pt-6 mt-6 border-t border-gray-200 dark:border-gray-700">
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 shadow-sm transition">Save Settings</button>
            </div>
        </form>
    </div>
</div>

<style>
    /* Simple Toggle Switch CSS */
    .toggle-checkbox:checked {
        right: 0;
        border-color: #4f46e5;
    }
    .toggle-checkbox:checked + .toggle-label {
        background-color: #4f46e5;
    }
    .toggle-checkbox {
        right: auto;
        left: 0;
        transition: all 0.2s ease-in;
    }
    .toggle-label {
        width: 3rem;
        height: 1.5rem;
    }
    #user_registration:checked ~ .toggle-label, #email_verification:checked ~ .toggle-label {
        background-color: #4f46e5;
    }
    #user_registration:checked.toggle-checkbox, #email_verification:checked.toggle-checkbox {
        right: 0;
        border-color: #68D391;
    }
</style>
@endsection
