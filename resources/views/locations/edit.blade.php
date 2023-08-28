<x-app>
    <section class="container my-5">
        <div class="card">
            <div class="card-header">
                <h2>Editar Character</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('character.edit.put', ['character' => $character->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <x-character.form-character  :locations="$locations" :origins="$origins" :character="$character" />
                </form>
            </div>
        </div>
    </section>
</x-app>