@component('mail::message')
# Password Reset

If you've lost your password or wish to reset it, use the link below to get started.

@component('mail::button', ['url' => 'change-password?token='.$token])
Reset Your Password
@endcomponent

If you did not request a password reset, you can safely ignore this email. Only a person with access to your email can reset your account password.

Thank You,<br>
{{ config('app.name') }}
@endcomponent
