@props(['heading'])

<section class="px-6 py-8 max-w-4xl mx-auto">
    <h1 class="text-lg font-semibold text-center mb-8 pb-2 border-b bg-green-200">
        {{ $heading }}
    </h1>

        <div class="flex">
            <aside class="w-48 flex-shrink-0">
                <h4 class="font-semibold mb-4">Links</h4>
                <ul>
                    <li class="mb-1">
                        <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500 font-semibold' : '' }}">All Posts</a>
                    </li>
                    <li>
                        <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500 font-semibold' : '' }}">New Post</a>
                    </li>
                </ul>
            </aside>

            <main class="flex-1">
                <x-panel>
                    {{ $slot }}
                </x-panel>
            </main>
        </div>


</section>
