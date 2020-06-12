@extends('layouts.app')

@section('content')
<div class="section-container"> 
    <!-- Page Header - START-->
    <div class="comp comp-page-short-header inverse" id="ch-1">
        <div class="comp-holder">
        <div class="hero-image-bg" style="background-color:#1c1c45">
            <div class="container">
            <div class="hero-header-text">
                <h1>Pollutant Standards Index (PSI)</h1>
                <p class="subtext"></p>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- Page Header - END-->
    </div>
    <div class="container">
    <div class="row">
        <div class="col-12">
        <div class="section-container account">  
            <div class="container account-container">  
            <div class="row"> 
                <div class="col-md-9 account-left">
                <p class="option-label">Keep track of PSI</p>
                <div class="account-body"> 
                    <div class="table-responsive-sm account-table">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <td>PSI 24 Hourly</td>
                            <td>PM10 24 Hourly</td>
                            <td>PM2.5 24 Hourly</td>
                            <td>CO Sub index</td>
                            <td>O3 Sub Index</td>
                            <td>SO2 Sub Index</td>
                        </tr>
                        </thead>
                        <tbody id="air_pollution_listing"></tbody>
                    </table>
                    </div>
                </div>
                </div>
                <div class="col-md-3 account-right">
                <!-- Breadcrumbs - START-->
                <div class="comp comp-account-sidebar" id="ac-1">
                    <div class="comp-holder">
                    <div class="account-sidebar">
                        <div class="account-side-nav">
                        <label>Station: </label>
                        <select id="location_selector"></select>
                        <ul>
                            <li> <a class="bold" href="#">Air Temperature</a>
                            <ul class="child-item">
                                <li><b>Station Name</b>
                                </li>
                                <li id="template_location">
                                </li>
                                <li><b>Time Stamp</b>
                                </li>
                                <li id="template_time">
                                </li>
                                <li><b>Air Temperature</b>
                                </li>
                                <li id="template_degree"></a>
                                </li>
                            </ul>
                        </ul>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- Breadcrumbs - END-->
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script>
    var baseUrl = $('#base_url').data('url');
    var weather_info = pollutant_info = undefined;
    $.get( baseUrl+"/api/air-pollution-data", function( response ) {
        pollutant_info = response.data.pollutant_info;
        weather_info = response.data.weather_info;
        filterStationName()
        var psi_table_html = "";
        $.each(pollutant_info, function(key, value) {
            psi_table_html += `
                <tr>
                    <td class="location">${value.location}</td>
                    <td>${value.pm10_twenty_four_hourly}</td>
                    <td>${value.pm25_twenty_four_hourly}</td>
                    <td>${value.co_sub_index}</td>
                    <td>${value.o3_sub_index}</td>
                    <td>${value.so2_sub_index}</td>
                </tr>
            `;
        });
        $('#air_pollution_listing').html(psi_table_html)
        var location_selector = "";
        $.each(weather_info, function(key, value) {
            location_selector += `
                <option value="${value.device_id}">${value.name}</option>
            `;
        });
        $('#location_selector').html(location_selector)
    });

    $('#location_selector').on('change',function() {
        filterStationName(this.value)
    })

    function filterStationName(device_id = "S109") {
        var row = weather_info.find(function(item) {
                            return item.device_id == device_id;
                        });
        if(row == undefined) return filterStationName(weather_info[0].device_id); //if Fail to find default location
        $("#template_location").html(row.name)
        $("#template_time").html(moment(row.created_at).tz('Asia/Singapore').format('YYYY MM D, H:mm:ss'))
        $("#template_degree").html(row.air_temp)
    }
</script>
@endpush

@push('style')
<style>
.comp.comp-account-sidebar {
    display: block !important;
}
#air_pollution_listing .location {
    text-transform: capitalize;
    font-weight: bolder;
}
</style>
@endpush