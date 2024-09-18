@extends('layouts.admin')

@section('content')

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <style>
                .carousel-inner {
                    border-radius: 10px;
                    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
                }
                .carousel-item img {
                    border-radius: 10px 10px 0 0;
                }
                .carousel-caption {
                    background-color: rgba(0, 0, 0, 0.5);
                    border-radius: 0 0 10px 10px;
                    bottom: 0;
                    color: white;
                    left: 0;
                    padding: 10px;
                    position: absolute;
                    right: 0;
                    text-align: center;
                    top: auto;
                }
            </style>
            <div id="dashboardCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#dashboardCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#dashboardCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://wowslider.com/sliders/demo-18/data1/images/hongkong1081704.jpg" class="d-block w-100" alt="Slide 1">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://wowslider.com/sliders/demo-18/data1/images/shanghai.jpg" class="d-block w-100" alt="Slide 2">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#dashboardCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#dashboardCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <br />
        </div>
        <div class="col-lg-3">
            <div class="card info-card customers-card">
                <div class="card-body">
                    <h5 class="card-title">Enrolled Members <span>| This Month</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <h6>1244</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card info-card customers-card">
                <div class="card-body">
                    <h5 class="card-title">Enrolled Members <span>| Last Month</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <h6>1244</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card info-card customers-card">
                <div class="card-body">
                    <h5 class="card-title">Enrolled Members <span>| This Month</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <h6>1244</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card info-card customers-card">
                <div class="card-body">
                    <h5 class="card-title">Enrolled Members <span>| Last Month</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <h6>1244</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection