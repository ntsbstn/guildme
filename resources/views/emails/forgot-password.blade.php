<h1>Hello</h1>
<p>Click on the following link to reset your password</p>
<p><a href="{{ env('APP_URL' )}}/reset/{{ $user->id }}/{{ $code }}"/>{{ env('APP_URL' )}}/activate/{{ $user->id }}/{{ $code }}</a></p>