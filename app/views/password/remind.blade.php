<h1>Remind Password</h1>

<form action="{{ action('RemindersController@store') }}" method="POST">
    <input class="input-block-level" type="email" name="email">
    <input class="button" type="submit" value="Send Reminder">
</form>