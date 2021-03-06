@extends('layout')

@section('title', 'Projects | All')

@section('vendor-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('frest/app-assets/css/pages/search.min.css') }}">
@endsection

@section('content')
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Search Bar Start -->
            <section class="search-bar-wrapper">
                <div class="search-bar">
                    <form action="{{ route('teacher.projects.index') }}" method="GET">
                        <fieldset class="search-input form-group position-relative">
                            <input name="search"
                                   value='{{ request()->query('search') }}'
                                   type="search"
                                   class="form-control rounded-right form-control-lg shadow pl-2"
                                   id="searchbar"
                                   placeholder="Search by title or description">
                            <button class="btn btn-light-primary search-btn rounded" type="submit">
                                <span class="d-none d-sm-block">Search</span>
                                <i class="bx bx-search d-block d-sm-none"></i>
                            </button>
                        </fieldset>
                    </form>
                </div>
            </section>
            <!-- Search Bar End -->

            <!-- List Start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                @if($projects->isNotEmpty())
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>TITLE</th>
                                                <th>STUDENT</th>
                                                <th>ACTION</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($projects as $project)
                                                <tr>
                                                    <td>{{ $project->id }}</td>
                                                    <td>{{ $project->title }}</td>
                                                    <td>{{ $project->student->full_name }}</td>
                                                    <td>
                                                        <a class="btn btn-icon rounded-circle btn-secondary shadow"
                                                           data-toggle="tooltip"
                                                           data-placement="top"
                                                           data-original-title="Edit"
                                                           href="{{ route('teacher.projects.edit', $project) }}">
                                                            <i class="bx bx-edit"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div class="d-flex align-items-center flex-wrap justify-content-between">
                                            <span class="mb-1">Showing {{ $projects->firstItem() }} to {{ $projects->lastItem() }} of {{ $projects->total() }} entries</span>
                                            {{ $projects->withQueryString()->links() }}
                                        </div>
                                    </div>
                                @else
                                    <p>No Projects</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- List End -->
        </div>
    </div>
@endsection
