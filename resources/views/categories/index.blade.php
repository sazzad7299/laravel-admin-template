@extends('layout.main')

@section('content')
    <div class="btn-group btn-group float-right mt-3" role="group">
        @can('create', App\Models\Category::class)
            <a href="{{ route('categories.create') }}" class="btn btn-success" title="Create New Category">
                <span class="fas fa-plus" aria-hidden="true"></span>
            </a>
        @endcan
    </div>
    <p class="clearfix"></p>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <div class="card-title">
                <h4>Categorys</h4>
            </div>
        </div>
        <div class="card-body">

            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $index => $category)
                        <tr>

                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>{!! $category->category_status !!}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    @can('update', $category)
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm"
                                            title="Edit category">
                                            <i class="far fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can('delete', $category)
                                        <button type="button" class="btn btn-danger btn-sm deleteCategory" data-toggle="modal"
                                            data-target="#deleteModal" data-category-id="{{ $category->id }}"
                                            data-category-name="{{ $category->name }}">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No Category Available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($categories->hasPages())
            <div class="card-footer">
                <div class="float-right">
                    {!! $categories->render() !!}
                </div>
            </div>
        @endif
    </div>
    <!-- Delete confirmation modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete <strong id="deleteCategoryName"></strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form id="deleteForm" method="POST" action="">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.deleteCategory').click(function() {
                var categoryId = $(this).data('category-id');
                console.log(categoryId);
                var categoryName = $(this).data('category-name');
                $('#deleteForm').attr('action', '/categories/' + categoryId);
                $('#deleteCategoryName').text(categoryName);
                $('#deleteModal').modal('show'); // Show the modal
            });
        });
    </script>
@endpush
