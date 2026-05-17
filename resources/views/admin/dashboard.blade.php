@extends('admin.layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard Admin</h1>
    </div>

   <!-- Content Row -->
<div class="row">

    @php
        $userCount = \App\Models\User::count();
        $categoryCount = \App\Models\Category::count();
        $articleCount = \App\Models\Article::count();
    @endphp

    <!-- Card Total Pengguna -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">

                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Pengguna
                        </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $userCount }}
                        </div>
                    </div>

                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Card Total Kategori -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">

                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Kategori
                        </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $categoryCount }}
                        </div>
                    </div>

                    <div class="col-auto">
                        <i class="fas fa-folder fa-2x text-gray-300"></i>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Card Total Berita -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">

                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Total Berita
                        </div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $articleCount }}
                        </div>
                    </div>

                    <div class="col-auto">
                        <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
