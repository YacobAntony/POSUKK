<div class="container-fluid mt-2">

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
              <a href="/admin/user/create" class="btn btn-primary"><i class="fas fa-plus"></i>Tambah</a>
              
              <table class="table mt-2">
                <tr>
                    <th>NO</th>
                    <th>nama </th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
 
                @foreach($user as $moking)

                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$moking->name }}</td>
                    <td>{{ $moking->email }}</td>
                    <td>
                    <a href="" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                    <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach

              </table>

            </div>
        </div>
    </div>
</div>
</div>