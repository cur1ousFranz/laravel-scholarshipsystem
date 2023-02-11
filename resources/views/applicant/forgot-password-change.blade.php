<x-layout title="Edukar | Forgot Pasword">
    <x-container>
        <div class="container mx-auto w-75 p-3 mt-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('forgot-password-update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <h4>Change Passsword</h4>
                        <input type="text" value="{{ request()->input('ftoken') }}" name="ftoken" hidden>
                        <x-form.input class="mt-4" type="password" name="password"/>
                        <x-form.input class="mt-4" type="password" name="password_confirmation"/>
                        <div class="d-flex justify-content-end">
                            <x-form.button class="mt-2 mb-3">Submit</x-form.button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-container>
</x-layout>