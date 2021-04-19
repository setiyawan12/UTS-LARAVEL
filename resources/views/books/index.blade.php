@extends('template')
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Crud Books</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('books.create') }}"> Create Post</a>
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
        @foreach ($books as $book)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $book->nama }}</td>
            <td>{{$book->kategori}}</td>
            <td>{{$book->stock}}</td>
            <td class="text-center">
                <form action="{{ route('books.destroy',$book->id) }}" method="POST">

                    <a class="btn btn-info btn-sm" href="{{ route('books.show',$book->id) }}">Show</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('books.edit',$book->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $books->links() !!}

@endsection
