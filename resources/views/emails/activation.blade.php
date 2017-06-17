<h1>Hello</h1>
<p>Click click on the foloowing link to activate your account</p>
<p><a href="{{ env('APP_URL' )}}/activate/{{ $user->id }}/{{ $code }}"/>{{ env('APP_URL' )}}/activate/{{ $user->id }}/{{ $code }}</a></p>