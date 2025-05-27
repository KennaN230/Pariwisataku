<!-- Leaflet CSS & JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<!-- Leaflet Routing Machine -->
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>

<div id="map" class="w-full h-96 my-6 rounded shadow" style="height: 500px;"></div>

<div class="map-controls mb-3">
    <button id="show-route" class="btn btn-primary btn-sm me-2">Tampilkan Rute</button>
    <button id="show-weather" class="btn btn-info btn-sm me-2">Tampilkan Cuaca</button>
    <button id="reset-map" class="btn btn-secondary btn-sm">Reset Peta</button>
</div>

<div id="weather-info" class="alert alert-info" style="display: none; position: absolute; top: 10px; right: 10px; z-index: 1000; width: 250px;"></div>

<script>
    // Inisialisasi peta
    var map = L.map('map').setView([-8.1723, 113.6995], 11);

    // Menambahkan tile layer (OpenStreetMap)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    }).addTo(map);

    // Kustom ikon
    var icons = {
        blue: L.icon({
            iconUrl: 'https://cdn.jsdelivr.net/gh/pointhi/leaflet-color-markers@master/img/marker-icon-blue.png',
            shadowUrl: 'https://unpkg.com/leaflet@1.9.3/dist/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41]
        }),
        green: L.icon({
            iconUrl: 'https://cdn.jsdelivr.net/gh/pointhi/leaflet-color-markers@master/img/marker-icon-green.png',
            shadowUrl: 'https://unpkg.com/leaflet@1.9.3/dist/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41]
        }),
        red: L.icon({
            iconUrl: 'https://cdn.jsdelivr.net/gh/pointhi/leaflet-color-markers@master/img/marker-icon-red.png',
            shadowUrl: 'https://unpkg.com/leaflet@1.9.3/dist/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41]
        })
    };

    // Variabel untuk routing dan weather
    var routingControl = null;
    var weatherMarker = null;
    var startMarker = null;
    var endMarker = null;

    // Ambil data dari Laravel
    var edukasi = @json($edukasi);
    var alam = @json($alam);
    var kuliner = @json($kuliner);

    // Fungsi untuk menambahkan marker
    function addMarkers(data, icon, category) {
        data.forEach(function(item) {
            if (item.latitude && item.longitude) {
                var marker = L.marker([item.latitude, item.longitude], { icon: icon })
                    .addTo(map)
                    .bindPopup(`<b>${category} ${item.nama}</b><br>${item.deskripsi.substring(0, 80)}...<br>
                               <button class="btn btn-sm btn-primary mt-1 set-start" data-lat="${item.latitude}" data-lng="${item.longitude}">Jadikan Start</button>
                               <button class="btn btn-sm btn-danger mt-1 set-end" data-lat="${item.latitude}" data-lng="${item.longitude}">Jadikan Tujuan</button>`);
                
                marker.on('popupopen', function() {
                    document.querySelectorAll('.set-start').forEach(btn => {
                        btn.addEventListener('click', function() {
                            setRouteStart(this.dataset.lat, this.dataset.lng);
                        });
                    });
                    document.querySelectorAll('.set-end').forEach(btn => {
                        btn.addEventListener('click', function() {
                            setRouteEnd(this.dataset.lat, this.dataset.lng);
                        });
                    });
                });
            }
        });
    }

    // Fungsi untuk set start point rute
    function setRouteStart(lat, lng) {
        if (startMarker) map.removeLayer(startMarker);
        startMarker = L.marker([lat, lng], {
            icon: L.icon({
                iconUrl: 'https://cdn.jsdelivr.net/gh/pointhi/leaflet-color-markers@master/img/marker-icon-gold.png',
                shadowUrl: 'https://unpkg.com/leaflet@1.9.3/dist/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41]
            })
        }).addTo(map).bindPopup("<b>Start Point</b>").openPopup();
        
        if (startMarker && endMarker) {
            calculateRoute();
        }
    }

    // Fungsi untuk set end point rute
    function setRouteEnd(lat, lng) {
        if (endMarker) map.removeLayer(endMarker);
        endMarker = L.marker([lat, lng], {
            icon: L.icon({
                iconUrl: 'https://cdn.jsdelivr.net/gh/pointhi/leaflet-color-markers@master/img/marker-icon-violet.png',
                shadowUrl: 'https://unpkg.com/leaflet@1.9.3/dist/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41]
            })
        }).addTo(map).bindPopup("<b>Tujuan</b>").openPopup();
        
        if (startMarker && endMarker) {
            calculateRoute();
        }
    }

    // Fungsi untuk menghitung rute
    function calculateRoute() {
        if (routingControl) map.removeControl(routingControl);
        
        routingControl = L.Routing.control({
            waypoints: [
                L.latLng(startMarker.getLatLng().lat, startMarker.getLatLng().lng),
                L.latLng(endMarker.getLatLng().lat, endMarker.getLatLng().lng)
            ],
            routeWhileDragging: true,
            showAlternatives: true,
            addWaypoints: false,
            draggableWaypoints: false,
            fitSelectedRoutes: true,
            lineOptions: {
                styles: [{color: '#3a7bd5', opacity: 0.7, weight: 5}]
            },
            createMarker: function() { return null; }
        }).addTo(map);
    }

    // Fungsi untuk menampilkan cuaca
    function showWeather() {
        // Hapus marker cuaca sebelumnya jika ada
        if (weatherMarker) map.removeLayer(weatherMarker);
        
        // Dapatkan posisi tengah peta
        const center = map.getCenter();
        const weatherInfo = document.getElementById('weather-info');
        
        // Tampilkan loading
        weatherInfo.innerHTML = 'Memuat data cuaca...';
        weatherInfo.style.display = 'block';
        
        // 1. PASTIKAN ANDA MEMILIKI API KEY DARI OPENWEATHERMAP
        // 2. GANTI 'YOUR_API_KEY' DENGAN API KEY ANDA
        const apiKey = 'd10ed4359f13e20dae1e1a8e9fb80c72'; // <-- INI HARUS DIGANTI
        
        // Endpoint untuk current weather
        fetch(`https://api.openweathermap.org/data/2.5/weather?lat=${center.lat}&lon=${center.lng}&appid=${apiKey}&units=metric&lang=id`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                console.log("Data cuaca:", data); // Untuk debugging
                
                if (data.cod === 200) {
                    const temp = Math.round(data.main.temp);
                    const desc = data.weather[0].description;
                    const icon = data.weather[0].icon;
                    const humidity = data.main.humidity;
                    const windSpeed = (data.wind.speed * 3.6).toFixed(1);
                    
                    weatherInfo.innerHTML = `
                        <h5>Cuaca di ${data.name || 'Lokasi Ini'}</h5>
                        <img src="https://openweathermap.org/img/wn/${icon}.png" alt="${desc}">
                        <p><strong>${temp}°C</strong>, ${desc}</p>
                        <p>Kelembaban: ${humidity}%</p>
                        <p>Angin: ${windSpeed} km/jam</p>
                    `;
                    
                    // Tambahkan marker cuaca
                    weatherMarker = L.marker([center.lat, center.lng], {
                        icon: L.icon({
                            iconUrl: `https://openweathermap.org/img/wn/${icon}.png`,
                            iconSize: [50, 50],
                            iconAnchor: [25, 25]
                        })
                    }).addTo(map).bindPopup(`<b>Cuaca</b><br>${temp}°C, ${desc}`);
                    
                } else {
                    weatherInfo.innerHTML = `Error: ${data.message || 'Gagal mendapatkan data cuaca'}`;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                weatherInfo.innerHTML = `
                    Gagal memuat data cuaca:<br>
                    <small>${error.message}</small><br>
                    Pastikan Anda memiliki API key yang valid dari OpenWeatherMap
                `;
            });
    }

    // Menambahkan marker untuk setiap kategori
    addMarkers(edukasi, icons.blue, '📘 Edukasi');
    addMarkers(alam, icons.green, '🌳 Alam');
    addMarkers(kuliner, icons.red, '🍴 Kuliner');

    // Event listeners untuk tombol kontrol
    document.getElementById('show-route').addEventListener('click', function() {
        if (startMarker && endMarker) {
            calculateRoute();
        } else {
            alert('Silakan pilih titik start dan tujuan terlebih dahulu dengan mengklik marker dan memilih "Jadikan Start" atau "Jadikan Tujuan"');
        }
    });

    document.getElementById('show-weather').addEventListener('click', showWeather);

    document.getElementById('reset-map').addEventListener('click', function() {
        if (routingControl) map.removeControl(routingControl);
        if (weatherMarker) map.removeLayer(weatherMarker);
        if (startMarker) map.removeLayer(startMarker);
        if (endMarker) map.removeLayer(endMarker);
        document.getElementById('weather-info').style.display = 'none';
        routingControl = null;
        weatherMarker = null;
        startMarker = null;
        endMarker = null;
    });

    // Memastikan ukuran peta diperbarui jika perlu
    map.invalidateSize();
</script>