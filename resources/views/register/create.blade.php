<x-layout>

    <section class="px-6 py-8">
        <main class="max-w-lg mt-10 mx-auto bg-gray-100 p-6 rounded-xl border border-gray-200  ">
            <h1 class="font-bold text-xl text-center">Register!</h1>
            <form action="/register" method="POST" class="mt-8">
                @csrf

                <x-form.input name="name"/>
                <x-form.input name="username"/>
                <x-form.input name="email"/>
                <x-form.input name="password" type="password"/>

                <x-form.button>Submit</x-form.button>
            </form>
        </main>
    </section>

</x-layout>
