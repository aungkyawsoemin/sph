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
                    <table class="table">
                        <thead>
                        <tr>
                            <td>PSI 24 Hourly</td>
                            <td>PM10 24 Hourly</td>
                            <td>PM2.5 24 Hourly</td>
                            <td>CO Sub index</td>
                            <td>O3 Sub Index</td>
                            <td>S)2 Sub Index</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="alert">
                            <td>National</td>
                            <td>26</td>
                            <td>17</td>
                            <td>100</td>
                            <td>80</td>
                            <td>15</td>
                        </tr>
                        <tr> 
                            <td>North</td>
                            <td>26</td>
                            <td>17</td>
                            <td>100</td>
                            <td>80</td>
                            <td>15</td>
                        </tr>
                        <tr> 
                            <td>South</td>
                            <td>26</td>
                            <td>17</td>
                            <td>100</td>
                            <td>80</td>
                            <td>15</td>
                        </tr>
                        <tr> 
                            <td>East</td>
                            <td>26</td>
                            <td>17</td>
                            <td>100</td>
                            <td>80</td>
                            <td>15</td>
                        </tr>
                        <tr> 
                            <td>West</td>
                            <td>26</td>
                            <td>17</td>
                            <td>100</td>
                            <td>80</td>
                            <td>15</td>
                        </tr>
                        </tbody>
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
                        <ul>
                            <li> <a class="bold" href="#">Air Temperature</a>
                            <ul class="child-item">
                                <li><b>Station Name</b>
                                </li>
                                <li>Ang Mo Kio Avenue 5
                                </li>
                                <li><b>Time Stamp</b>
                                </li>
                                <li>2020 06 08 01:02:00
                                </li>
                                <li><b>Air Temperature</b>
                                </li>
                                <li>30 Degree</a>
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