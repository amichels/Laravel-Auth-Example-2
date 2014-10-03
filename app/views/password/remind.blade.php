<h1>Remind Password</h1>

<form action="{{ action('RemindersController@store') }}" method="POST">
    <input type="email" name="email">
    <input type="submit" value="Send Reminder">
</form>