<div class="mb-6" data-type="{{ $type }}">
    <!-- label -->
    <label for="input-{{ $name }}" class="font-bold">{{ $label }}</label>

    <!-- input with icon  -->
    <div class="relative mt-2">
        <!-- icon -->
        <button
            disabled="disabled"
            id="icon-{{ $name }}"
            type="button"
            class="
                absolute
                right-0
                pr-3

                flex
                inset-y-0
                items-center

                text-{{ $color }}-500
            "
        >
            <!-- icon for input text -->
            @isset($icon)
                <div class="w-6">
                    @svg($icon)
                </div>
            @endisset

            <!-- icon for input password -->
            @empty($icon)
                <div class="w-6 cursor-pointer" id="eyeOn" onclick="password('{{ $name }}')">
                    <x-fas-eye />
                </div>

                <div class="w-6 hidden cursor-pointer" id="eyeOff" onclick="password('{{ $name }}')">
                    <x-fas-eye-slash />
                </div>
            @endempty
        </button>

        <!-- input -->
        <input
            onKeyUp="refresh('{{ $name }}', '{{ $color }}')"
            id="input-{{ $name }}"
            name="{{ $name }}"
            type="{{ $type }}"
            class="
                px-5 py-5 pr-10 w-full

                bg-gray-100
                text-slate-600
                rounded-md

                border-2
                border-dotted
                border-{{ $color }}-500

                focus:outline-none
                focus:bg-white
                focus:ring
                focus:ring-offset-2
            "
        />
    </div>

    <!-- error message -->
    <div id="error-{{ $name }}-block" class="grid justify-items-center hidden">
        <span
            class="
                px-3 py-1 -mt-3 w-9/12

                inline-flex

                -rotate-1
                items-center
                text-sm
                bg-red-400
                rounded-md
            "
        >
            <div class="w-6"><x-fas-exclamation-triangle /></div>
            <p class="ml-2" id="error-{{ $name }}-message"></p>
        </span>
    </div>

    <!-- javascript -->
    <script>
        //create an observer
        observers['{{ $name }}'] = new MutationObserver( function(mutations) {
            //action when target observed is changed (set input on red)
            let ErrorMessage    = u('#error-{{ $name }}-message');
            let error           = ErrorMessage.text();

            if( error ) {
                let Input = u('#input-{{ $name }}');
                Input.removeClass('border-{{ $color }}-500');
                Input.addClass('border-red-500');

                let Icon = u('#icon-{{ $name }}');
                Icon.removeClass('text-{{ $color }}-500');
                Icon.addClass('text-red-500');
            }
        } );

        //defining the target
        observers['{{ $name }}'].observe(document.querySelector('#error-{{ $name }}-message'), { childList: true });



        //clear error message and red color on focus
        function refresh(name, color) {
            let ErrorMessage    = u('#error-' + name + '-message');
            let error           = ErrorMessage.text();

            if( error ) {
                //clear error
                ErrorMessage.text('');

                let Input = u('#input-' + name);
                Input.removeClass('border-red-500');
                Input.addClass('border-{{ $color }}-500');

                let Icon = u('#icon-' + name);
                Icon.removeClass('text-red-500');
                Icon.addClass('text-' + color + '-500');

                let ErrorBlock = u('#error-' + name + '-block');
                ErrorBlock.addClass('hidden');
            }
        }



        //change password visibility type
        function password(name) {
            let Input   = u('#input-' + name);
            let IconOn  = u('#eyeOn');
            let IconOff = u('#eyeOff');

            if( Input.attr('type') == 'password' ) {
                Input.attr('type', 'text');
                IconOn.addClass('hidden');
                IconOff.removeClass('hidden');
            }
            else {
                Input.attr('type', 'password');
                IconOn.removeClass('hidden');
                IconOff.addClass('hidden');
            }

            document.getElementById('input-' + name).focus();
        }
    </script>
</div>
