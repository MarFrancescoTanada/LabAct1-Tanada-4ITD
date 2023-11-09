<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <x-slot name="header">
        <div class = "row justify-content-between">
            <div class="col-auto">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Category List') }}
            </h2>
            </div>
            <div class="col-auto">
                <a href="{{ route('newCategoryForm') }}" class="btn btn-secondary">New Category</a>
            </div>
    </x-slot>

    <div class="container mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>Created by ID# </th>
                    <th>Category Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Deleted At</th>
                </tr>
            </thead>
            <tbody>
                     @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->user_id }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>{{ $category->updated_at }}</td>
                            <td>{{ $category->deleted_at }}</td>
                        </tr>
                    @endforeach
                </tbody>

        </table>
    </div>

</x-app-layout>
