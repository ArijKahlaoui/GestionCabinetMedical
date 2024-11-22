@extends('layouts.admin')
@section('title')
Dashboard
@endsection
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Dashboard</h1>
        <section class="section dashboard">
            <div class="row">
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
                  <div class="card-body">
                    <h5 class="card-title">Nombre des utilisateurs <span>| Today</span></h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <img src="{{asset('dash/img/users.png')}}" alt="" style="border-radius: 10% ;width: 80px;">
                      </div>
                      <div class="ps-3">
                        <h6>{{ $usersCount }}</h6>
                      </div>
                    </div>
                  </div>
  
                </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">
                  <div class="card-body">
                    <h5 class="card-title">Nombre des patients <span>| This Month</span></h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <img src="{{asset('dash/img/patient.png')}}" alt="" style="border-radius: 10% ;width: 80px;">
                      </div>
                      <div class="ps-3">
                        <h6>{{ $patientsCount }}</h6>
                      </div>
                    </div>
                  </div>
  
                </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">
                <div class="card info-card customers-card">
                  <div class="card-body">
                    <h5 class="card-title">Nombre des medecins  <span>| This Year</span></h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <img src="{{asset('dash/img/medecin.png')}}" alt="" style="border-radius: 10% ;width: 80px;">
                      </div>
                      <div class="ps-3">
                        <h6>{{ $medecinsCount }}</h6>
                      </div>
                    </div>
  
                  </div>
                </div>
  
              </div><!-- End Customers Card -->

           <!-- Reports -->
            <div class="col-12">
                <div class="card">
            
                <div class="card-body">
                    <h5 class="card-title">Reports <span>/Today</span></h5>
            
                    <!-- Line Chart -->
                    <div id="reportsChart"></div>
            
                    <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                            name: 'Nombre total d\'utilisateurs',
                            data: [{{$usersCount}}],
                        }, {
                            name: 'Nombre de patients',
                            data: [{{$patientsCount}}],
                        }, {
                            name: 'Nombre de médecins',
                            data: [{{$medecinsCount}}],
                        }],
                        chart: {
                            height: 350,
                            type: 'area',
                            toolbar: {
                            show: false
                            },
                        },
                        markers: {
                            size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d'],
                        fill: {
                            type: "gradient",
                            gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        stroke: {
                            curve: 'smooth',
                            width: 2
                        },
                        xaxis: {
                            type: 'category',
                            categories: ['Nombre total d\'utilisateurs', 'Nombre de patients', 'Nombre de médecins']
                        },
                        tooltip: {
                            x: {
                            format: 'dd/MM/yy HH:mm'
                            },
                        }
                        }).render();
                    });
                    </script>
                </div>
                </div>
            </div>
        </section>
    </div>
</main>

@endsection