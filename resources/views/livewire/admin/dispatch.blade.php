<div class="dashboard-container">
    <!-- Locations Section -->
    <div class="locations">
        <div class="header">
            <h2>LOCATIONS</h2>
            <div class="return-journey">
                <label><input type="checkbox" id="return_journey" name="return_journey"> Return Journey?</label>
            </div>
        </div>
        <div class="address-fields">
            <div class="address-field">
                <label>Address or Postcode</label>
                <input type="text" id="pickup_location" name="pickup_location">
                <button type="button">+</button>
            </div>
            <div class="address-field">
                <label>Address or Postcode</label>
                <input type="text" id="dropoff_location" name="dropoff_location">
                <button type="button">+</button>
            </div>
            <div class="timing">
                <label><input type="radio" name="timing" value="now" checked> Now</label>
                <label><input type="radio" name="timing" value="later"> Later</label>
            </div>
            <div class="vehicle-type">
                <select id="vehicle_type" name="vehicle_type">
                    <option value="executive">Executive</option>
                    <option value="saloon">Saloon</option>
                    <option value="estate">Estate</option>
                    <option value="mpv">MPV</option>
                    <!-- Add more vehicle types as needed -->
                </select>
            </div>
        </div>
    </div>

    <!-- Passengers Section -->
    <div class="passengers">
        <h2>PASSENGERS</h2>
        <div class="passenger-details">
            <select id="account" name="account">
                <option value="default">Select Account</option>
                <!-- Dynamically populate account options -->
            </select>
            <input type="search" id="passenger_search" placeholder="Passenger">
            <button type="button">+</button>
        </div>
        <div class="passenger-count">
            <input type="number" id="adults" name="adults" placeholder="0">
            <input type="number" id="children" name="children" placeholder="0">
            <input type="number" id="infants" name="infants" placeholder="0">
        </div>
        <button type="button">Add item +</button>
    </div>

    <!-- Payment and Driver Section -->
    <div class="payment-driver">
        <h2>PAYMENT & DRIVER</h2>
        <div class="payment-details">
            <select id="payment_type" name="payment_type">
                <option value="card">Card</option>
                <option value="cash">Cash</option>
                <option value="account">Account</option>
                <!-- Add more payment types as needed -->
            </select>
            <label><input type="checkbox" id="paid" name="paid"> Paid</label>
            <input type="text" id="price" name="price" placeholder="Price">
            <select id="tax_type" name="tax_type">
                <option value="included">Tax included</option>
                <option value="excluded">Tax excluded</option>
                <!-- Add more tax types as needed -->
            </select>
            <input type="text" id="tax_rate" name="tax_rate" placeholder="Tax rate (%)">
            <button type="button" id="get_quote">Get Quote</button>
        </div>
    </div>

    <!-- Booking Tabs -->
    <div class="booking-tabs">
        <ul class="nav nav-tabs" id="bookingTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="next24h-tab" data-toggle="tab" href="#next24h" role="tab" aria-controls="next24h" aria-selected="true">Next 24h</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="latest-tab" data-toggle="tab" href="#latest" role="tab" aria-controls="latest" aria-selected="false">Latest</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false">Completed</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="cancelled-tab" data-toggle="tab" href="#cancelled" role="tab" aria-controls="cancelled" aria-selected="false">Cancelled</a>
            </li>
            <!-- Add more tabs as needed -->
        </ul>
        <div class="tab-content" id="bookingTabsContent">
            <div class="tab-pane fade show active" id="next24h" role="tabpanel" aria-labelledby="next24h-tab">
                <!-- Content for Next 24h bookings -->
            </div>
            <div class="tab-pane fade" id="latest" role="tabpanel" aria-labelledby="latest-tab">
                <!-- Content for Latest bookings -->
            </div>
            <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                <!-- Content for Completed bookings -->
            </div>
            <div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
                <!-- Content for Cancelled bookings -->
            </div>
            <!-- Add more content for additional tabs as needed -->
        </div>
    </div>

    <!-- Map Section -->
    <div class="map-section">
        <div id="map" style="height: 400px;">
            <!-- Google Maps integration goes here -->
            <!-- Ensure you have a valid Google Maps API key to use the Maps JavaScript API -->
            <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
        </div>
    </div>

</div>