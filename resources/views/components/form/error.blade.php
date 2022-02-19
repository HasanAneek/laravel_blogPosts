@props(['name'])

@error($name)
    <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
@enderror
