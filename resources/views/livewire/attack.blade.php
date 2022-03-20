<div>
    <h1>{{ $title }}</h1>
    <div x-data="{ open: false }">
        <button @click="open = true">Show More...</button>

        <ul x-show="open" @click.away="open = false">
            <li>
                <button wire:click="change" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">Change</button>
            </li>
        </ul>
    </div>
</div>
