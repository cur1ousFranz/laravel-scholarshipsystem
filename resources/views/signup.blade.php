<x-layout>
    <x-container>
        <div class="container w-50">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h2>Sign up</h2>
                    </div>
                    <form action="/users" method="post">
                        @csrf
                        <x-form.input name="username"/>
                        <x-form.input class="mt-2" name="email"/>
                        <x-form.input class="mt-2" type="password" name="password"/>
                        <x-form.input class="mt-2" type="password" name="password_confirmation"/>
                        <hr class="mt-3 mb-1">
                        <x-form.button class="mt-3 form-control">Sign up</x-form.button>
                    </form>
                </div>
            </div>
        </div>
    </x-container>
</x-layout>
