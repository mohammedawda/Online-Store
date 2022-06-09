@component('mail::message')
# Password Reset
Welcome {{$data['data']->name}}
The body of your message.

@component('mail::button', ['url' => adminUrl('reset/password/'.$data['token'])])
Click Here to Reset Your Password
@endcomponent
or<br/>
Copy This Link
<a href="{{adminUrl('reset/password/'.$data['token'])}}">{{adminUrl('reset/password/'.$data['token'])}}</a>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
