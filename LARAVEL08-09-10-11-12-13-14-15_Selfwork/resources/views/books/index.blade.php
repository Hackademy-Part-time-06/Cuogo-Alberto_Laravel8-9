<x-main>
    <x-slot name="title">LIBRARY | All Books</x-slot>

    <h1 class="text-center mb-4">ALL BOOKS</h1>


    <x-session />

    <div class="container">
        <table class="table border mt-2">
            <thead class="text-light bg-dark">
                <tr>
                    <th scope="col" class="text-center col-2">#</th>
                    <th scope="col" class="col-4">Title</th>
                    <th scope="col" class="col-3">Author</th>
                    <th scope="col" class="col-3"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                <tr class="align-middle">
                    <th scope="row" class="text-center">{{$loop->iteration}}</th>
                    <td>{{$book['title']}}</td>
                    <td>{{$book->author->firstname}} {{$book->author->surname}}</td>
                    <td>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{route('books.show', ['book' => $book['id']])}}"
                                class="btn btn-primary me-md-2"><i class="bi bi-search"></i></a>

                            @auth

                            <a href="{{route('books.edit', ['book' => $book['id']])}}"
                                class="btn btn-warning me-md-2"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{route('books.destroy', compact('book'))}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="bi bi-x-circle"></i></button>
                            </form>
                        
                            @endauth

                        </div>


                    </td>
                </tr>
                @empty
                <tr colspan="4"> </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @auth
        <div class="d-flex justify-content-center mt-5">
            <a href="{{ route('books.create') }}" class="text-center w-50 bg-primary rounded text-light mb-4 px-5 py-3 fs-3 text-decoration-none">Add Book<i class="bi bi-bookmark-plus ms-3"></i></a> 
        </div>
    @endauth
</x-main>