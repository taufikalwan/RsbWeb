@extends('layouts.app')

@section('content')

    <!-- Main content -->
    <section class="content pt-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Review</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Content</th>
                        <th>Rating</th>
                        <th>Product</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th class="text-center" style="width: 30px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                         @foreach($reviews as $review)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                            <a href="{{ route('admin.reviews.show', $review->id) }}">
                                {{ $review->user_id ? $review->user->first_name : $review->first_name }}
                            </a><br>
                            <small>{{ $review->email }}</small><br>
                            </td>
                            <td>{{ $review->content }}</td>
                            <td><span class="badge badge-success">{{ $review->rating }}</span></td>
                            <td>{{ $review->product->name }}</td>
                            <td>{{ $review->status }}</td>
                            <td>{{ $review->created_at ? $review->created_at->format('Y-m-d') : '' }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.reviews.edit', $review) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form onclick="return confirm('are you sure !')" action="{{ route('admin.reviews.destroy', $review) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
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

@push('style-alt')
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
@endpush

@push('script-alt') 
    <script
        src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous"
    >
    </script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    <script>
    $("#data-table").DataTable();
    </script>
@endpush