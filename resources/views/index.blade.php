<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Map Flood Prediction</title>

    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
        integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
        crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <style>
        #mapid {
            min-height: 500px;
        }
    </style>

    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-12 text-end">
                <a href="{{ route('login') }}" class="btn btn-sm btn-secondary">Login</a>
            </div>
        </div>
        <hr>
        <div class="row mt-5 mb-5">
            <div class="col-12">
                <form action="" method="GET" class="d-flex">
                    <div class="form-group flex-grow-1 mr-2">
                        <input type="text" class="form-control w-100" id="searchInput" name="search"
                            placeholder="Search by District, City, or Province">
                    </div>
                </form>
            </div>
        </div>

        <div class="row mb-5 leaflet">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" id="mapid"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
        integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
        crossorigin=""></script>
    <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        var map = L.map('mapid').setView([-8.0882, 111.9045], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var cityName = 'Tulungagung';
        axios.get('{{ route('map-data') }}', {
                params: {
                    nama_kota: cityName
                }
            })
            .then(function(response) {
                var locations = response.data;

                locations.forEach(function(location) {
                    var label = location.kota.nama_kecamatan + ', ' + location.kota.nama_kota_kabupaten + ', ' +
                        location.kota.nama_provinsi;
                    var marker = L.marker([parseFloat(location.kota.latitude), parseFloat(location.kota
                            .longitude)])
                        .addTo(map);
                    marker.bindPopup(label).openPopup();

                    var circle = L.circle([parseFloat(location.kota.latitude), parseFloat(location.kota
                        .longitude)], {
                        color: 'red',
                        fillColor: 'red',
                        fillOpacity: 0.25,
                        radius: 2000
                    }).addTo(map);
                });
            })
            .catch(function(error) {
                console.log(error);
            });
    </script>
</body>

</html>
