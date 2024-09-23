// javas.js
document.addEventListener('DOMContentLoaded', () => {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            position => {
                const { latitude, longitude } = position.coords;

                // Set latitude and longitude as cookies
                document.cookie = `latitude=${latitude}; path=/`;
                document.cookie = `longitude=${longitude}; path=/`;
                // Populate hidden fields with cookies' values
                document.getElementById('hidden-latitude').value = latitude;
                document.getElementById('hidden-longitude').value = longitude;
                console.log((latitude.longitude));
            },
            error => {
                console.error('Error getting location:', error);
            }
        );
    } else {
        console.error('Geolocation is not supported by this browser.');
    }
});
