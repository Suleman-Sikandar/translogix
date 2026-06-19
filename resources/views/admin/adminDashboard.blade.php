@extends('admin.layout.app')

@section('sidebar')
    @include('admin.includes.sidebar')
@endsection

@section('navbar')
    @include('admin.includes.navBar')
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- HEADER & BREADCRUMB -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between py-1">
                    <div>
                        <h4 class="fw-bold mb-0 text-dark">{{ $pageTitle }}</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item text-muted">{{ $parentTitle ?? 'TransLogix Hub' }}</li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $subTitle }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <!-- OPERATIONAL ALERTS SECTION -->
        <div class="row mb-2">
            <div class="col-md-6 mb-3">
                <div class="card bg-label-danger border border-danger shadow-none">
                    <div class="card-body d-flex align-items-center py-3">
                        <i class="bx bx-error-circle fs-3 me-3 text-danger"></i>
                        <div>
                            <h6 class="mb-0 text-danger fw-bold">Double-Booking Conflict Detected!</h6>
                            <small class="text-dark"><strong>TRK-15</strong> has overlapping schedule conflicts.</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="card bg-label-warning border border-warning shadow-none">
                    <div class="card-body d-flex align-items-center py-3">
                        <i class="bx bx-battery text-warning fs-3 me-3"></i>
                        <div>
                            <h6 class="mb-0 text-warning fw-bold">Driver Signal Alerts</h6>
                            <small class="text-dark"><strong>TRK-08 (Ali)</strong> — Signal lost / battery dead.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- NEW ATTRACTIVE COUNTER COMMAND CENTER (Clickable Record Modules) -->
        <div class="row g-3 mb-4">
            <!-- 1. Pending Orders Counter -->
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <a href="{{ url('admin/orders?status=pending') }}" class="card text-center h-100 border shadow-sm-hover transition-all text-decoration-none bg-white py-3">
                    <div class="card-body p-2">
                        <span class="badge bg-label-warning p-2 rounded mb-2"><i class="bx bx-time-five fs-4"></i></span>
                        <h4 class="fw-bold text-dark mb-1">{{ $pendingOrdersCount ?? '12' }}</h4>
                        <span class="fw-semibold text-muted small d-block">Pending Orders</span>
                    </div>
                </a>
            </div>

            <!-- 2. Dispatched / En Route Trucks Counter -->
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <a href="{{ url('admin/fleet?status=dispatched') }}" class="card text-center h-100 border shadow-sm-hover transition-all text-decoration-none bg-white py-3">
                    <div class="card-body p-2">
                        <span class="badge bg-label-info p-2 rounded mb-2"><i class="bx bx-paper-plane fs-4"></i></span>
                        <h4 class="fw-bold text-dark mb-1">{{ $dispatchedTrucksCount ?? '24' }}</h4>
                        <span class="fw-semibold text-muted small d-block">Dispatched Trucks</span>
                    </div>
                </a>
            </div>

            <!-- 3. Pending Invoices Counter -->
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <a href="{{ url('admin/invoices?status=pending') }}" class="card text-center h-100 border shadow-sm-hover transition-all text-decoration-none bg-white py-3">
                    <div class="card-body p-2">
                        <span class="badge bg-label-danger p-2 rounded mb-2"><i class="bx bx-receipt fs-4"></i></span>
                        <h4 class="fw-bold text-dark mb-1">{{ $pendingInvoicesCount ?? '7' }}</h4>
                        <span class="fw-semibold text-muted small d-block">Pending Invoices</span>
                    </div>
                </a>
            </div>

            <!-- 4. Total Active Drivers Module -->
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <a href="{{ url('admin/drivers') }}" class="card text-center h-100 border shadow-sm-hover transition-all text-decoration-none bg-white py-3">
                    <div class="card-body p-2">
                        <span class="badge bg-label-primary p-2 rounded mb-2"><i class="bx bx-user fs-4"></i></span>
                        <h4 class="fw-bold text-dark mb-1">{{ $activeDriversCount ?? '52' }}</h4>
                        <span class="fw-semibold text-muted small d-block">Total Drivers</span>
                    </div>
                </a>
            </div>

            <!-- 5. Under Maintenance Fleet Module -->
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <a href="{{ url('admin/maintenance') }}" class="card text-center h-100 border shadow-sm-hover transition-all text-decoration-none bg-white py-3">
                    <div class="card-body p-2">
                        <span class="badge bg-label-secondary p-2 rounded mb-2"><i class="bx bx-wrench fs-4"></i></span>
                        <h4 class="fw-bold text-dark mb-1">{{ $maintenanceCount ?? '3' }}</h4>
                        <span class="fw-semibold text-muted small d-block">In Workshop</span>
                    </div>
                </a>
            </div>

            <!-- 6. Total Tracked Customers List -->
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <a href="{{ url('admin/customers') }}" class="card text-center h-100 border shadow-sm-hover transition-all text-decoration-none bg-white py-3">
                    <div class="card-body p-2">
                        <span class="badge bg-label-success p-2 rounded mb-2"><i class="bx bx-group fs-4"></i></span>
                        <h4 class="fw-bold text-dark mb-1">{{ $totalCustomersCount ?? '84' }}</h4>
                        <span class="fw-semibold text-muted small d-block">Active Clients</span>
                    </div>
                </a>
            </div>
        </div>

        <!-- VISUAL CHARTS ROW -->
        <div class="row">
            <!-- Weekly Fleet Metrics Graphic Overview -->
            <div class="col-12 col-lg-12 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="row row-bordered g-0">
                        <div class="col-md-8 p-4">
                            <h5 class="card-header m-0 p-0 pb-3 fw-bold text-dark">Deliveries & Operational Trends</h5>
                            <div id="totalRevenueChart" class="px-2"></div>
                        </div>
                        <div class="col-md-4 p-4 d-flex flex-column justify-content-between border-start">
                            <div>
                                <h5 class="card-header m-0 p-0 text-center fw-bold text-dark">Fleet Capacity Load</h5>
                                <div id="growthChart" class="my-3"></div>
                            </div>
                            <div class="text-center bg-label-success rounded p-3">
                                <small class="text-dark fw-semibold d-block">Collected Revenue (MTD)</small>
                                <h3 class="fw-bold text-success mb-0">$18.4k</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- LOWER DATA SECTION: TABLES AND REALTIME LISTS -->
        <div class="row">
            <!-- RECENT SHIPMENTS TABLE -->
            <div class="col-12 col-xl-8 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="m-0 fw-bold text-dark">Live Shipments Status</h5>
                        <a href="{{ url('admin/orders') }}" class="btn btn-sm btn-outline-primary">View All</a>
                    </div>
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Booking Ref</th>
                                    <th>Customer Client</th>
                                    <th>Assigned Fleet</th>
                                    <th>Status</th>
                                    <th>Quick Tracking</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td><strong>#1042</strong></td>
                                    <td>Al-Hamd Traders</td>
                                    <td><span class="badge bg-label-info fw-bold">TRK-08</span></td>
                                    <td><span class="badge bg-label-info">In transit</span></td>
                                    <td>
                                        <button class="btn btn-xs btn-primary shadow-none" onclick="navigator.clipboard.writeText('https://translogix.com/track/1042')">
                                            <i class="bx bx-copy me-1"></i> WhatsApp Link
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>#1041</strong></td>
                                    <td>Zafar & Co</td>
                                    <td><span class="badge bg-label-warning fw-bold">TRK-15</span></td>
                                    <td><span class="badge bg-label-success">Delivered</span></td>
                                    <td>
                                        <span class="text-danger fw-bold small"><i class="bx bx-error-circle me-1"></i>Unbilled Invoice</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>#1040</strong></td>
                                    <td>Bilal Hardware</td>
                                    <td><span class="badge bg-label-dark fw-bold">TRK-02</span></td>
                                    <td><span class="badge bg-label-warning">Pending Allocation</span></td>
                                    <td>
                                        <button class="btn btn-xs btn-outline-secondary" disabled><i class="bx bx-block me-1"></i> Not Started</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- TRUCK TRACKING & MAINTENANCE LIST -->
            <div class="col-12 col-xl-4 mb-4">
                <!-- FLEET TRACKER STATUS -->
                <div class="card mb-4 shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-dark mb-3">Live Fleet Allocation</h5>
                        <ul class="list-unstyled p-0 m-0">
                            <li class="d-flex mb-3 pb-1 border-bottom border-light">
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2 pb-2">
                                    <div><h6 class="mb-0 fw-bold text-dark">TRK-02</h6><small class="text-muted">City Delivery</small></div>
                                    <div><span class="badge bg-label-success">Standby Ready</span></div>
                                </div>
                            </li>
                            <li class="d-flex mb-3 pb-1 border-bottom border-light">
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2 pb-2">
                                    <div><h6 class="mb-0 fw-bold text-dark">TRK-08</h6><small class="text-muted">Long Haul Route</small></div>
                                    <div><span class="badge bg-label-info">On active route</span></div>
                                </div>
                            </li>
                            <li class="d-flex pb-1">
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div><h6 class="mb-0 fw-bold text-dark">TRK-15</h6><small class="text-muted">Engine Maintenance</small></div>
                                    <div><span class="badge bg-label-danger">In Workshop</span></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- HIGHEST EXPENSE BREAKDOWN -->
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-dark mb-3">Fleet Expense Alerts</h5>
                        <ul class="list-unstyled p-0 m-0">
                            <li class="d-flex mb-2 justify-content-between align-items-center bg-light p-2 rounded">
                                <span class="text-dark fw-semibold">1. TRK-15 Workshop Run</span>
                                <span class="text-danger fw-bold">$2,450 YTD</span>
                            </li>
                            <li class="d-flex mb-0 justify-content-between align-items-center bg-light p-2 rounded mt-2">
                                <span class="text-dark fw-semibold">2. TRK-04 Brake Overhaul</span>
                                <span class="text-danger fw-bold">$1,820 YTD</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Extra UI polish styles directly inside the view to add transitions safely -->
    <style>
        .shadow-sm-hover { transition: transform 0.2s ease, box-shadow 0.2s ease; }
        .shadow-sm-hover:hover { transform: translateY(-3px); box-shadow: 0 .5rem 1rem rgba(0,0,0,.08)!important; }
    </style>
@endsection

@section('footer')
    @include('admin.includes.footer')
@endsection
