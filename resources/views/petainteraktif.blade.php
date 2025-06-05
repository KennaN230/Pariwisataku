<!-- Leaflet CSS & JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<!-- Leaflet Routing Machine -->
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

<style>

    .category-filter {
    position: absolute;
    top: 100px;
    right: 20px;
    background: white;
    padding: 12px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    z-index: 1000;
    transition: all 0.3s ease;
    opacity: 1;
    transform: translateX(0);
}

.category-filter.hidden {
    opacity: 0;
    transform: translateX(20px);
    pointer-events: none;
}

@media (max-width: 768px) {
    .category-filter {
        top: 80px;
        right: 10px;
        max-width: 150px;
    }
}
    #map {
        height: 600px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
    }
    
    #map:hover {
        box-shadow: 0 6px 16px rgba(0,0,0,0.15);
    }
    
    .map-controls {
        background: white;
        padding: 12px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        margin-bottom: 16px;
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }
    
    .map-btn {
        padding: 8px 16px;
        border-radius: 6px;
        font-weight: 500;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s ease;
        border: none;
        cursor: pointer;
    }
    
    .map-btn:hover {
        transform: translateY(-1px);
    }
    
    .map-btn-primary {
        background: #3b82f6;
        color: white;
    }
    
    .map-btn-primary:hover {
        background: #2563eb;
    }
    
    .map-btn-info {
        background: #06b6d4;
        color: white;
    }
    
    .map-btn-info:hover {
        background: #0891b2;
    }
    
    .map-btn-secondary {
        background: #f1f5f9;
        color: #334155;
    }
    
    .map-btn-secondary:hover {
        background: #e2e8f0;
    }
    
    .map-btn-warning {
        background: #f59e0b;
        color: white;
    }
    
    .map-btn-warning:hover {
        background: #d97706;
    }
    
    #weather-info {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(5px);
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        padding: 12px;
        border-left: 4px solid #06b6d4;
    }
    
    .weather-header {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 8px;
    }
    
    .weather-icon {
        width: 40px;
        height: 40px;
    }
    
    .custom-popup {
        min-width: 250px;
    }
    
    .popup-header {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 8px;
        color: #1e293b;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    
    .popup-content {
        font-size: 14px;
        color: #475569;
        margin-bottom: 12px;
    }
    
    .popup-buttons {
        display: flex;
        gap: 6px;
        margin-top: 8px;
    }
    
    .popup-btn {
        flex: 1;
        padding: 6px 8px;
        font-size: 12px;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 4px;
    }
    
    .popup-btn:hover {
        transform: translateY(-1px);
    }
    
    .popup-btn-start {
        background: #f59e0b;
        color: white;
    }
    
    .popup-btn-start:hover {
        background: #d97706;
    }
    
    .popup-btn-end {
        background: #8b5cf6;
        color: white;
    }
    
    .popup-btn-end:hover {
        background: #7c3aed;
    }
    
    .route-info {
        position: absolute;
        bottom: 20px;
        left: 20px;
        background: rgba(255, 255, 255, 0.9);
        padding: 12px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        z-index: 1000;
        max-width: 250px;
        font-size: 14px;
    }
    
    .category-filter {
        position: absolute;
        top: 100px;
        right: 20px;
        background: white;
        padding: 12px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        z-index: 1000;
    }
    
    .category-filter h5 {
        margin-top: 0;
        margin-bottom: 10px;
        font-size: 14px;
    }
    
    .category-filter label {
        display: flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 6px;
        cursor: pointer;
        font-size: 13px;
    }
    
    @media (max-width: 768px) {
        #map {
            height: 450px;
        }
        
        .map-controls {
            flex-direction: column;
        }
        
        .category-filter {
            top: 80px;
            right: 10px;
            max-width: 150px;
        }
    }
</style>

<div id="map"></div>

<div class="map-controls">
    <button id="show-route" class="map-btn map-btn-primary">
        <i class="fas fa-route"></i> Tampilkan Rute
    </button>
    <button id="show-weather" class="map-btn map-btn-info">
        <i class="fas fa-cloud-sun"></i> Tampilkan Cuaca
    </button>
    <button id="reset-map" class="map-btn map-btn-secondary">
        <i class="fas fa-sync-alt"></i> Reset Peta
    </button>
    <button id="show-souvenirs" class="map-btn map-btn-warning">
        <i class="fas fa-gift"></i> Toko Oleh-Oleh
    </button>
    <button id="toggle-filter-btn" class="map-btn map-btn-secondary">
        <i class="fas fa-filter"></i> Sembunyikan Filter
    </button>
</div>

<div id="weather-info" style="display: none;"></div>
<div id="route-info" class="route-info" style="display: none;"></div>
<div class="category-filter">
    <h5>Filter Kategori:</h5>
    <label>
        <input type="checkbox" class="category-toggle" data-category="edukasi" checked> 📚 Edukasi
    </label>
    <label>
        <input type="checkbox" class="category-toggle" data-category="alam" checked> 🌲 Alam
    </label>
    <label>
        <input type="checkbox" class="category-toggle" data-category="kuliner" checked> 🍜 Kuliner
    </label>
    <label>
        <input type="checkbox" class="category-toggle" data-category="oleh2" checked> 🎁 Oleh-Oleh
    </label>
</div>

<script>
    // Initialize map with smoother animation
    var map = L.map('map', {
        center: [-8.1723, 113.6995],
        zoom: 11,
        zoomControl: false,
        preferCanvas: true,
        fadeAnimation: true,
        zoomAnimation: true
    });

    // Add zoom control with better position
    L.control.zoom({
        position: 'topright'
    }).addTo(map);

    // Add tile layer with different style option
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        maxZoom: 18,
        detectRetina: true
    }).addTo(map);

    // Custom icons with shadow
    var icons = {
        blue: L.icon({
            iconUrl: 'https://cdn.jsdelivr.net/gh/pointhi/leaflet-color-markers@master/img/marker-icon-2x-blue.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        }),
        green: L.icon({
            iconUrl: 'https://cdn.jsdelivr.net/gh/pointhi/leaflet-color-markers@master/img/marker-icon-2x-green.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        }),
        red: L.icon({
            iconUrl: 'https://cdn.jsdelivr.net/gh/pointhi/leaflet-color-markers@master/img/marker-icon-2x-red.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        }),
        orange: L.icon({
            iconUrl: 'https://cdn.jsdelivr.net/gh/pointhi/leaflet-color-markers@master/img/marker-icon-2x-orange.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        })
    };

    // Variables for map features
    var routingControl = null;
    var weatherMarker = null;
    var startMarker = null;
    var endMarker = null;
    var routeInfo = document.getElementById('route-info');
    var markers = {
        edukasi: [],
        alam: [],
        kuliner: [],
        oleh2: []
    };
    var weatherRangeCircle = null;

    // Get data from Laravel
    var edukasi = @json($edukasi);
    var alam = @json($alam);
    var kuliner = @json($kuliner);
    var oleh2 = @json($oleh2);

    // Function to add markers with beautiful popups
    function addMarkers(data, icon, category, emoji) {
        data.forEach(function(item) {
            if (item.latitude && item.longitude) {
                var marker = L.marker([item.latitude, item.longitude], { 
                    icon: icon,
                    riseOnHover: true
                }).addTo(map);
                
                // Store marker reference for filtering
                markers[category].push(marker);
                
                // Create custom popup content
                var popupContent = `
                    <div class="custom-popup">
                        <div class="popup-header">
                            ${emoji} ${item.nama}
                        </div>
                        <div class="popup-content">
                            ${item.deskripsi ? item.deskripsi.substring(0, 100) + '...' : 'Tidak ada deskripsi'}
                            ${item.rating ? `<div style="margin-top: 6px;"><i class="fas fa-star" style="color: #f59e0b;"></i> ${item.rating}/5</div>` : ''}
                        </div>
                        <div class="popup-buttons">
                            <button class="popup-btn popup-btn-start set-start" 
                                data-lat="${item.latitude}" 
                                data-lng="${item.longitude}">
                                <i class="fas fa-play"></i> Start
                            </button>
                            <button class="popup-btn popup-btn-end set-end" 
                                data-lat="${item.latitude}" 
                                data-lng="${item.longitude}">
                                <i class="fas fa-flag"></i> Tujuan
                            </button>
                        </div>
                    </div>
                `;
                
                marker.bindPopup(popupContent);
                
                marker.on('popupopen', function() {
                    document.querySelectorAll('.set-start').forEach(btn => {
                        btn.addEventListener('click', function() {
                            setRouteStart(this.dataset.lat, this.dataset.lng);
                            map.closePopup();
                        });
                    });
                    document.querySelectorAll('.set-end').forEach(btn => {
                        btn.addEventListener('click', function() {
                            setRouteEnd(this.dataset.lat, this.dataset.lng);
                            map.closePopup();
                        });
                    });
                });
            }
        });
    }

    // Function to set start point with animation
    function setRouteStart(lat, lng) {
        if (startMarker) map.removeLayer(startMarker);
        
        startMarker = L.marker([lat, lng], {
            icon: L.icon({
                iconUrl: 'https://cdn.jsdelivr.net/gh/pointhi/leaflet-color-markers@master/img/marker-icon-2x-gold.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            }),
            zIndexOffset: 1000
        }).addTo(map);
        
        // Add bounce animation
        startMarker.on('add', function() {
            this._icon.classList.add('animate__animated', 'animate__bounceIn');
        });
        
        startMarker.bindPopup("<b>📍 Titik Awal</b>").openPopup();
        
        if (endMarker) {
            calculateRoute();
        }
        
        updateRouteInfo();
    }

    // Function to set end point with animation
    function setRouteEnd(lat, lng) {
        if (endMarker) map.removeLayer(endMarker);
        
        endMarker = L.marker([lat, lng], {
            icon: L.icon({
                iconUrl: 'https://cdn.jsdelivr.net/gh/pointhi/leaflet-color-markers@master/img/marker-icon-2x-violet.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            }),
            zIndexOffset: 1000
        }).addTo(map);
        
        // Add bounce animation
        endMarker.on('add', function() {
            this._icon.classList.add('animate__animated', 'animate__bounceIn');
        });
        
        endMarker.bindPopup("<b>🏁 Titik Tujuan</b>").openPopup();
        
        if (startMarker) {
            calculateRoute();
        }
        
        updateRouteInfo();
    }

    // Function to calculate and display route
    function calculateRoute() {
        if (routingControl) {
            map.removeControl(routingControl);
        }

        routingControl = L.Routing.control({
            waypoints: [
                startMarker.getLatLng(),
                endMarker.getLatLng()
            ],
            routeWhileDragging: false
        }).addTo(map);

        routingControl.on('routesfound', function (e) {
            const route = e.routes[0];
            const summary = route.summary;
            const distance = (summary.totalDistance / 1000).toFixed(2);
            const time = (summary.totalTime / 60).toFixed(1);

            routeInfo.innerHTML = `
                <h5>Informasi Rute:</h5>
                <p>Jarak: ${distance} km</p>
                <p>Estimasi Waktu: ${time} menit</p>
            `;
            routeInfo.style.display = 'block';
        });
    }

    // Function to update route information
    function updateRouteInfo() {
        if (startMarker && endMarker) {
            routeInfo.style.display = 'block';
            routeInfo.innerHTML = `
                <div><i class="fas fa-map-marker-alt text-yellow-500"></i> Titik awal dipilih</div>
                <div><i class="fas fa-flag text-purple-500"></i> Titik tujuan dipilih</div>
                <div class="mt-2">Klik "Tampilkan Rute" untuk melihat petunjuk</div>
            `;
        } else if (startMarker) {
            routeInfo.style.display = 'block';
            routeInfo.innerHTML = `
                <div><i class="fas fa-map-marker-alt text-yellow-500"></i> Titik awal dipilih</div>
                <div class="mt-2">Pilih titik tujuan</div>
            `;
        } else if (endMarker) {
            routeInfo.style.display = 'block';
            routeInfo.innerHTML = `
                <div><i class="fas fa-flag text-purple-500"></i> Titik tujuan dipilih</div>
                <div class="mt-2">Pilih titik awal</div>
            `;
        } else {
            routeInfo.style.display = 'none';
        }
    }

    // Function to show weather with beautiful UI
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

    // Function to toggle marker visibility
    function toggleMarkers(category, show) {
        markers[category].forEach(marker => {
            if (show) {
                map.addLayer(marker);
            } else {
                map.removeLayer(marker);
            }
        });
    }

    // Add markers for each category with emojis
    addMarkers(edukasi, icons.blue, 'edukasi', '📚');
    addMarkers(alam, icons.green, 'alam', '🌲');
    addMarkers(kuliner, icons.red, 'kuliner', '🍜');
    addMarkers(oleh2, icons.orange, 'oleh2', '🎁');

    // Event listeners for control buttons
    document.getElementById('show-route').addEventListener('click', () => {
        if (startMarker && endMarker) {
            calculateRoute();
        } else {
            alert('Silakan pilih titik awal dan tujuan terlebih dahulu.');
        }
    });

    document.getElementById('show-weather').addEventListener('click', showWeather);

    document.getElementById('reset-map').addEventListener('click', () => {
        if (routingControl) map.removeControl(routingControl);
        if (startMarker) map.removeLayer(startMarker);
        if (endMarker) map.removeLayer(endMarker);
        if (weatherMarker) map.removeLayer(weatherMarker);
        if (weatherRangeCircle) map.removeLayer(weatherRangeCircle);
        routeInfo.innerHTML = '';
        routeInfo.style.display = 'none';
        document.getElementById('weather-info').style.display = 'none';
        startMarker = null;
        endMarker = null;
    });

    // Event listener for category toggles
    document.querySelectorAll('.category-toggle').forEach(toggle => {
        toggle.addEventListener('change', function() {
            const category = this.dataset.category;
            toggleMarkers(category, this.checked);
        });
    });

    // Add hover effect to buttons
    const buttons = document.querySelectorAll('.map-btn');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', () => {
            button.style.transform = 'translateY(-2px)';
            button.style.boxShadow = '0 4px 8px rgba(0,0,0,0.1)';
        });
        button.addEventListener('mouseleave', () => {
            button.style.transform = '';
            button.style.boxShadow = '';
        });
    });
    
    const filterPanel = document.querySelector('.category-filter');
const toggleFilterBtn = document.getElementById('toggle-filter-btn');
let isFilterVisible = true;

toggleFilterBtn.addEventListener('click', () => {
    isFilterVisible = !isFilterVisible;
    
    if (isFilterVisible) {
        filterPanel.classList.remove('hidden');
        toggleFilterBtn.innerHTML = '<i class="fas fa-filter"></i> Sembunyikan Filter';
    } else {
        filterPanel.classList.add('hidden');
        toggleFilterBtn.innerHTML = '<i class="fas fa-filter"></i> Tampilkan Filter';
    }
    
    // Untuk memastikan map tidak terganggu oleh event
    map.invalidateSize();
});

    // Ensure map size is correct
    setTimeout(() => {
        map.invalidateSize();
    }, 200);
</script>