<div>


    <head>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@24.4.0/build/css/intlTelInput.css">
    </head>

    @if ($mode == 'edit')
        <livewire:customer.edit-user-profile :user="$user" />
    @elseif($mode == 'view')
        <livewire:customer.view-user-profile :user="$user" />
    @elseif($mode == 'password')
        <livewire:customer.password-user-profile :user="$user" />
    @endif
</div>
