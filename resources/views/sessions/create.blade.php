<x-layout>

    <section class="px-6 py-8">
        <main class="max-w-lg mt-10 mx-auto">
            <x-panel>
                <h1 class="font-bold text-xl text-center">Log In!</h1>

                <form action="/login" method="POST" class="mt-8">
                    @csrf

                    <x-form.input name="email" type="email" autocomplete="username"/>
                    <x-form.input name="password" type="password" autocomplete="new-password"/>

                    <x-form.button>Log In</x-form.button>
                </form>
            </x-panel>

        </main>
    </section>

</x-layout>
