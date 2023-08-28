<x-app>
    <div class="card mx-5 my-5">
        <div class="card-header d-flex justify-content-between">
                <h2>Locations</h2>
                <a href="{{route('location.create')}}" class="btn btn-primary">Add location</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Dimension</th>
                        <th scope="col">Residents</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($locations as $location)
                    <tr>
                        <td>{{$location['name']}}</td>
                        <td>{{$location['type']}}</td>
                        <td>{{$location['dimension']}}</td>
                        <td>{{ implode(', ', $location['residents']) }}</td>
                        <td class="d-flex">
                        <a href="{{route('location.edit', ['location'=> $location['id']])}}" class="btn btn-warning btn-sm me-1">Editar</a>
                        <form action="{{route('location.delete', ['location' => $location['id']])}}" method="post">
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