@extends('layouts.app')

@section('content')

    <!-- Main content -->
    <section class="content pt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Kategori</h3>
                <a href="{{ route('admin.categories.index')}}" class="btn btn-success shadow-sm float-right"> <i class="fa fa-arrow-left"></i> Kembali</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{ route('admin.categories.update', $category) }}" enctype="multipart/form-data">
                    @csrf 
                    @method('put')
                    <div class="form-group row border-bottom pb-4">
                        <label for="name" class="col-sm-2 col-form-label">Nama Kategori</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}" id="name">
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                      <label for="image" style="display: inline;" class="col-sm-2 col-form-label">Gambar</label>
                      <div class="card">
                        <img width="100" src="{{ Storage::url($category->image) }}" alt="">
                      </div>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" name="image" value="{{ old('image') }}" id="image">
                        </div>
                    </div>
                    <div class="form-group row border-bottom pb-4">
                        <label for="parent_id" class="col-sm-2 col-form-label">Kategori Utama</label>
                        <div class="col-sm-10">
                          <select class="form-control" name="parent_id" id="parent_id">
                            <option value="">Atur sebagai Kategori Utama</option>
                            @foreach($main_categories as $main_category)
                              <option {{ old('parent_id', $category->parent_id) == $main_category->id ? 'selected' : null }} value="{{ $main_category->id }}"> {{ $main_category->name }}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection