@extends('layout.main')

@section('content')

    <div class="btn-group btn-group float-right mt-3" role="group">
        @can("viewAny", App\Models\Category::class)
            <a href="{{ route('categories.index') }}" class="btn btn-primary" title="Show All category">
                <span class="fa fa-list" aria-hidden="true"></span>
            </a>
        @endcan
        @can("viewAny", App\Models\Category::class)
            <a href="{{ route('categories.create') }}" class="btn btn-success" title="Create New category">
                <span class="fa fa-plus" aria-hidden="true"></span>
            </a>
        @endcan
    </div>
    <p class="clearfix"></p>
    <form method="POST" action="{{ route('categories.update', $category->id) }}">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <div class="card-title">
                    <h4>{{ $category->name }}</h4>
                </div>
            </div>
            <div class="card-body">
                @csrf
                @method("PUT")
                @include ('categories.form', ['category' => $category])
            </div>
            <div class="card-footer">
                <input class="btn btn-primary float-right" type="submit" value="Update">
                <p class="clearfix"></p>
            </div>
        </div>
    </form>

@endsection
