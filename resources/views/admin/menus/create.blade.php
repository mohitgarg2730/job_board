@extends('admin.layouts.app')
@section('content')
<main id="main" class="main">

    <div class="page-content">

        <h1>Create Menu</h1>

        <form action="{{ route('admin.menus.store') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col-sm-10">
                    <label for="inputPhoneNo2" class="col-sm-2 col-form-label mb-2  ">Title</label>
                    <input type="text" name="title" class="form-control" required>


                    @error('page_name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-sm-10 mt-2">
                    <label>URL</label>
                    <input type="text" name="url" class="form-control">
                </div>
                <div class="col-sm-10 mt-2">
                    <div class="menu_wraper">
                        <label class="mb-2"> Parent Menu</label>
                        <select name="parent_id" class="form-control">
                            <option value="">None</option>
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>

    </div>




</main>






@endsection