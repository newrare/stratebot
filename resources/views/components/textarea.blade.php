<class="mb-6">
    <!-- label -->
    <label for="textarea-{{ $name }}" class="font-bold">{{ $label }}</label>

    <!-- textarea -->
    <div class="relative mt-2">
        <textarea
            onKeyUp="refresh('{{ $name }}', '{{ $color }}')"
            id="textarea-{{ $name }}"
            name="{{ $name }}"
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
        ></textarea>
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
            //action when target observed is changed (set textarea on red)
            let ErrorMessage    = u('#error-{{ $name }}-message');
            let error           = ErrorMessage.text();

            if( error ) {
                let Textarea = u('#textarea-{{ $name }}');
                Textarea.removeClass('border-{{ $color }}-500');
                Textarea.addClass('border-red-500');
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

                let Textarea = u('#textarea-' + name);
                Textarea.removeClass('border-red-500');
                Textarea.addClass('border-{{ $color }}-500');

                let ErrorBlock = u('#error-' + name + '-block');
                ErrorBlock.addClass('hidden');
            }
        }
    </script>
</div>
