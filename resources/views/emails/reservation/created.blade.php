<h1>Hi {{ $reservation['user_name'] }}</h1>
<h1>Reservation Created</h1>
<p>Your reservation has been created successfully.</p>
<p>Reservation Details:</p>
<ul>
    <li>Amenity Name: {{ $reservation['amenity_name'] }}</li>
    <li>Reservation Date: {{ $reservation['date'] }}</li>
</ul>
