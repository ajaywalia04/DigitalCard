@component('mail::message')
# Welcome to {{ config('app.name') }}!

Hi {{ $user->name }},

Thank you for signing up on **{{ config('app.name') }}**, your digital business card companion!

With your account, you can:
- Organize your card on the basis of tag and category.
- Share your card and accept cards from others.
- Add your company name, designation, and a compelling bio.

@component('mail::button', ['url' => route('show.login.form')])
Login & Get Started
@endcomponent

If you have any questions, feel free to reply to this email. We're excited to have you on board!

Thanks,
The {{ config('app.name') }} Team
@endcomponent
