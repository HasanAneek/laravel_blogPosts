@props(['name'])

<label for= "{{ $name }}"
       class="block uppercase font-bold text-xs text-gray-700 mb-2"
>{{ ucwords($name) }}</label>
