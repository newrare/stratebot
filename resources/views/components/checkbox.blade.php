<div
    class="
        flex
        items-center
        justify-between

        rounded
        border-2
        border-dotted
        border-{{ $color }}-500
    "
>
    <label
        for="{{ $name }}"
        class="
            py-2 ml-4 w-full

            text-sm
            font-bold
            text-white
        "
    >
        {{ $label }}
    </label>

    <input
        {{ $checked }}
        id="{{ $name }}"
        type="checkbox"
        value=""
        name="{{ $name }}"
        class="
            mr-4 my-2 w-5 h-5

            bg-gray-100
            text-{{ $color }}-600

            rounded
            border-{{ $color }}-300

            focus:ring-{{ $color }}-500
            focus:ring-2
        "
    >
</div>
