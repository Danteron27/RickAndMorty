<x-app>
    <div class="card mx-5 my-5">
        <div class="card-header d-flex justify-content-between">
                <h2>Characters</h2>
                <a href="{{route('character.create')}}" class="btn btn-primary">Add Character</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Location</th>
                        <th scope="col">Origin</th>
                        <th scope="col">Status</th>
                        <th scope="col">Specie</th>
                        <th scope="col">Type</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($characters as $character)
                    <tr>
                        <td>{{$character['name']}}</td>
                        <td>{{$character['location']}}</td>
                        <td>{{$character['origin']}}</td>
                        <td>{{$character['status']}}</td>
                        <td>{{$character['species']}}</td>
                        <td>{{$character['Type']}}</td>
                        <td>{{$character['gender']}}</td>
                        <td class="d-flex">
                        <a href="{{route('character.edit', ['character'=> $character['id']])}}" class="btn btn-warning btn-sm me-1">Editar</a>
                        <form action="{{route('character.delete', ['character' => $character['id']])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</x-app>