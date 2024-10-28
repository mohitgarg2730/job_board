<!-- resources/views/admin/menus/index.blade.php -->
@extends('admin.layouts.app')

@section('content')
<main id="main" class="main">

    <div class="page-content">
        <h1>Menus</h1>
        <div class="row">
            <div class="col-lg-12 mb-3 text-end"> <a href="{{ route('admin.menus.create') }}" class="btn btn-primary">Add Menu</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">URL</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $menu)
                        <tr>
                            <td>{{ $menu->title }}</td>
                            <td> ({{ $menu->url }})</td>
                            <td><a href="{{ route('admin.menus.edit', $menu->id) }}" class="btn btn-primary">Edit</a>
                                <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit " class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            @if($menu->children->isNotEmpty())
                                @include('admin.menus.partials.tree', ['menus' => $menu->children])
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>
</main>
@endsection