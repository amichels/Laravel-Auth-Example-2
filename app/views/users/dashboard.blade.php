<h1>Dashboard</h1>
 
<p>Welcome to your Dashboard, {{ $user->firstname }}.</p>

{{ HTML::linkAction('UsersController@getEdit', 'Edit Profile Info') }} | 
{{ HTML::linkAction('UsersController@getDelete', 'Delete Profile') }}