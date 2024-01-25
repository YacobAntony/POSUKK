<main role="main" class="main-content">

<div class="container-fluid mt-2">
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <h5><b>{{$title}}</b></h5>
              <a href="/admin/user/create" class="btn btn-primary"><i class="fas fa-plus"></i>Tambah</a>
      
              <table class="table mt-2">
                <tr>
                    <th>NO</th>
                    <th>nama </th>
                    <th>Email</th>
                    <th>Peran</th>
                    <th>Aksi</th>
                </tr>
 
                @foreach($user as $moking)

                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$moking->name }}</td>
                    <td>{{ $moking->email }}</td>
                    <td>{{ $moking->role }}</td>
                    <td>
                        <div class="d-flex">
                    <a href="/admin/user/{{ $moking->id }}/edit" class="btn btn-info btn-sm"><i class="fe fe-edit"></i></a>

                    <!-- iki delete -->
                    <form action="/admin/user/{{ $moking->id }}" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" class ="btn btn-danger btn-sm ml-1"><i class = "fe fe-trash"></i></button>
                    </form>
                    <!-- endelet -->
                    </div>
                    </td>
                </tr>
                @endforeach
              </table>

            </div>
        </div>
    </div>
</div>
</div>