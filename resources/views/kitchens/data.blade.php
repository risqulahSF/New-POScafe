@extends('templates.temp')

@section('title', $title)

@section('name', 'udin')

@section('mainCont')
    @if (session('notif'))
        <div class="alert alert-{{ session('notif')['type'] }} ">
            {{ session('notif')['mess'] }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-4">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">{{ $edit ? 'Edit' : 'Add New' }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ $edit ? route('Category.update', $recCategory->id) : route('Category.store') }}"
                    method="POST">
                    @csrf
                    @if ($edit)
                        @method('PUT')
                    @endif

                    <div class="card-body">
                        <div class="form-group">
                            <label for="nmCategory">Nama Kategori</label>
                            <input type="text" name="nmCategory" id="nmCategory"
                                value="{{ @old('nmCategory') ? @old('nmCategory') : @$recCategory->nm_category }}"
                                class="form-control @error('nmCategory') is-invalid @enderror">
                            <div class="invalid-feedback">
                                @error('nmCategory')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="IconCategory">Icon Kategori</label>
                            <input type="text" class="form-control" id="IconCategory" name="iconCategory">
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer d-flex">
                        <button type="submit" class="btn btn-success">Submit</button>
                        @if ($edit)
                            <a href="{{ route('Category.index') }}" class="btn btn-warning mx-4">Add</a>
                        @endif
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-secondary">
                    <div class="card-tools px-2">
                        <h4 class="card-title">Data</h4>
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
        </div>
    </div>


@endsection

{{-- @section('customJs')
    <script>
    $('.c').click(function() {
            Toast.fire({
                icon: 'success',
                title: {{$notif['mess']}}
            })
        });
    </script>
@endsection --}}
