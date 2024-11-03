@extends('user.template')
@section('content')
<div class="row d-flex justify-content-center">
    <div class="m-2 p-5 card shadow">
        <h1 class="text-center">Data User</h1>
        <!-- <a href="{{route('m_user.create')}}" class="btn btn-success my-2">+ Tambah User</a> -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" width="20px">User Id</th>
                    <th scope="col" width="150px">Level Id</th>
                    <th scope="col" width="200px">Username</th>
                    <th scope="col" width="200px">Nama</th>
                    <th scope="col" width="150px">Password</th>
                    <th scope="col" width="100px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $users)
                <tr>
                    <td>{{$users -> user_id}}</td>
                    <td>{{$users -> level_id}}</td>
                    <td>{{$users -> username}}</td>
                    <td>{{$users -> nama}}</td>
                    <td>{{$users -> password}}</td>
                    <td>
                        <form action="{{route('m_user.destroy', $users->user_id)}}" method="post">
                        <a href="{{route('m_user.show', $users->user_id)}}" class="btn btn-info btn-sm">show</a>
                        <a href="{{route('m_user.edit', $users->user_id)}}" class="btn btn-primary btn-sm">Edit</a>
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm" 
                        onclick="return confirm('Apakah Yakin Untuk Menghapus data ini?')">
                            delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection