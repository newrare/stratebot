<button
    @isset($submit)
        onclick="{{ $submit }}"
    @endisset

    type="button"
    class="
        text-white
        py-4 px-4 my-4
        rounded-lg

        bg-{{ $color }}-500
        hover:bg-{{ $color }}-600

        flex
        items-center
        shadow hover:shadow-lg
        font-bold

        transition
        transform
        hover:-translate-y-0.5
    "
>
    <div class="w-6 mr-2">
        @svg($icon)
    </div>

    {{ $message }}
</button>
