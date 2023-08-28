<x-app>
<section class="container my-5">
        <div class="card">
            <div class="card-header">
                <h2>Create Character</h2>
            </div>
            <div class="card-body">
                <form action="{{route('character.create.post')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-character.form-character  :locations="$locations" :origins="$origins" :character="$character" />

                </form>
            </div>
        </div>
    </section>
</x-app>