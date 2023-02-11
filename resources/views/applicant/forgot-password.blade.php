<x-layout title="Edukar | Forgot Pasword">
    <x-container>
        <div class="container mx-auto w-75 p-3 mt-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('forgot-password-send') }}" method="POST">
                        @csrf
                        <h4>Forgot Password</h4>
                        <p>Please input your email address</p>
                        <x-form.input name="email"/>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="mt-2 mb-3 me-2 btn bg-secondary text-white" onclick="history.back()">Get back</button>
                            <x-form.button class="mt-2 mb-3">Submit</x-form.button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-container>
</x-layout>