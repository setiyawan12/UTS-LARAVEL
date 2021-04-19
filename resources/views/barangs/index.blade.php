@extends('template')
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Crud Barang</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('barangs.create') }}"> Create Barang</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Nama Buku</th>
            <th>Kategori Buku</th>
            <th>Stock Buku</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @forelse ($barangs as $item)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{$item->kategori}}</td>
            <td>{{$item->stock}}</td>
            <td class="text-center">
                <form action="{{ route('barangs.destroy',$item->id) }}" method="POST">

                    <a class="btn btn-info btn-sm" href="{{ route('barangs.show',$item->id) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('barangs.edit',$item->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center"> Tidak Ada Data</td></tr>
        @endforelse
    </table>

    {!! $barangs->links() !!}

@endsection
