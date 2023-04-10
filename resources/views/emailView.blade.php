{{-- @component('mail::message')
    # Hello, said
    Thanks for signing up for our service. We're excited to have you on board!

    @component('mail::button', ['url' => 'facebook.com'])
        Click here to access your account
    @endcomponent

    If you have any questions or concerns, don't hesitate to contact us.

    Thanks,<br>
    The Example Team
@endcomponent --}}


# Hello, {{auth()->user()->name}}
Thanks for signing up for our service. We're excited to have you on board!
