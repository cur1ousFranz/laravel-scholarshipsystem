<x-layout title="Edukar | Sign up">
    <x-container>
        <div class="container" style="min-width: 200px; max-width: 450px">
            <div class="card">
                <div class="card-body">
                    <h2 class="mb-3 font-weight-bold">Sign up</h2>
                    <form action="/users" method="post">
                        @csrf
                        <x-form.input name="username"/>
                        <x-form.input class="mt-4" name="email"/>
                        <x-form.input class="mt-4" type="password" name="password"/>
                        <x-form.input class="mt-4" type="password" name="password_confirmation"/>
                        <hr class="mt-3 mb-1">
                        <x-form.button class="mt-3 form-control">Sign up</x-form.button>
                    </form>
                </div>
            </div>
        </div>
    </x-container>
</x-layout>
