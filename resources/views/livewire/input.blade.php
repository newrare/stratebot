<div
    class="mb-6"
    x-data="{
        error: @entangle('error'),
        password: @entangle('password'),
        type: @entangle('type'),
        icon: @entangle('icon'),
        color: @entangle('color'),

        seePassword(label) {
            if( 'password' == this.type ) {
                if( 'password' == label.type ) {
                    label.type = 'text';
                }
                else if( 'text' == label.type ) {
                    label.type = 'password';
                }

                this.password = !this.password;
                label.focus();
            }
        },

        get colorClassText() {
            color = this.color;

            if( this.error ) {
                color = 'red';
            }

            return 'text-' + color + '-500';
        },

        get colorClass() {
            color = this.color;

            if( this.error ) {
                color = 'red';
            }

            return 'border-' + color + '-500 focus:ring-' + color + '-500';
        }
    }"
>
    <label for="{{ $label }}" class="font-bold">{{ $label }}</label>

    <!-- input with icon -->
    <div class="relative mt-2">
        <button
            @click="seePassword({{ $label }})"
            :class="type == 'password' ? '' : 'pointer-events-none'"
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
            <div class="w-6" :class="colorClassText" x-show="type == 'password' && password">
                <x-fas-eye />
            </div>

            <div class="w-6" :class="colorClassText" x-show="type == 'password' && !password">
                <x-fas-eye-slash />
            </div>

            <div class="w-6" :class="colorClassText" x-show="type == 'text'">
                @svg($icon)
            </div>
        </button>

        <input
            id="{{ $label }}"
            @keyup="error = false"
            :type="password ? 'password' : 'text'"
            :class="colorClass"
            class="
                px-5
                py-5
                pr-10

                bg-gray-100
                text-slate-600
                rounded-md
                w-full

                border-dotted
                border-2

                focus:outline-none
                focus:bg-white
                focus:ring
                focus:ring-offset-2
            "
        />
    </div>

    <!-- error message -->
    <div x-show="error" class="grid justify-items-center">
        <span
            class="
                px-3
                py-1
                -mt-3

                inline-flex

                -rotate-1
                items-center
                text-sm
                bg-red-400
                rounded-md
                w-9/12
            "
        >
            <div class="w-6">
                <x-fas-exclamation-triangle />
            </div>
            <p class="ml-2">{{ $error }}</p>
        </span>
    </div>
</div>
