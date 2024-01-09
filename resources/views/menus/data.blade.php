@extends('templates.temp')

@section('title', $title)

@section('name', 'udin')

@section('mainCont')
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <a href="{{ route('Menu.create') }}" class="btn btn-primary px-5">Add</a>
            </div>
        </div>
        <div class="card-body">
            <table class="dtTable table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Icon Kategori</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dtCategory as $recCategory)
                        <tr>
                            <td>{{ $recCategory->id }}</td>
                            <td>{{ $recCategory->nm_category }}</td>
                            <td>{{ $recCategory->icon_category }}</td>
                            <td class="text-center">
                                <form action="{{ route('Category.destroy', $recCategory->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('Category.edit', $recCategory->id) }}"
                                        class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>
                                    <button class="btn btn-sm btn-danger" type="submit"><i
                                            class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



@endsection
