<form id='formBot'>
    @csrf

    <!-- x-input name='name'        icon='fas-robot'    /-->
    <x-input name='description' icon='fas-book' />

    <x-textarea name='test' />

    <x-button submit="/api/bot" for='formBot' />
</form>
