<h1>Reset Password</h1>

<form action="{{ action('RemindersController@update') }}" method="POST">
    <input type="hidden" name="token" value="{{ $token }}">
    <input class="input-block-level" type="email" name="email">
    <input class="input-block-level" type="password" name="password">
    <input class="input-block-level" type="password" name="password_confirmation">
    <input class="button" type="submit" value="Reset Password">
</form>