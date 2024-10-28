<!-- resources/views/admin/menus/partials/tree.blade.php -->
<ul>
    @foreach($menus as $menu)
        <li>
            {{ $menu->title }} ({{ $menu->url }})
            <a href="{{ route('admin.menus.edit', $menu->id) }}">Edit</a>
            <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>

            @if($menu->children->isNotEmpty())
                @include('admin.menus.partials.tree', ['menus' => $menu->children])
            @endif
        </li>
    @endforeach
</ul>
