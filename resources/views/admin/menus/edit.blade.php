@extends('admin.layouts.app')
@section('content')
<main id="main" class="main">

    <div class="page-content">

        <h1>Edit Menu</h1>

        <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-10 mt-3">
                    <div>
                        <label class="mb-2">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $menu->title }}" required>
                    </div>
                </div>
                <div class="col-md-10 mt-3">
                <label class="mb-2">URL</label>
                <input type="text" name="url"  class="form-control" value="{{ $menu->url }}">
            </div>
            <div class="col-md-10 mt-3">
            <div class="menu_wraper">
                <label class="mb-2">Parent Menu</label>
                <select name="parent_id"  class="form-control">
                    <option value="">None</option>
                    @foreach($menus as $m)
                        <option value="{{ $m->id }}" {{ $m->id == $menu->parent_id ? 'selected' : '' }}>{{ $m->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            </div>
            </div>

           
           
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
</main>






@endsection