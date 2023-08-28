<x-app title="Rick and Morty">
    <section class="d-flex justify-content-center flex-wrap">
    @foreach ($characters as $character)
    <div class="card mx-3 my-3" style="width: 18rem;">
        <img src="{{$character['image']}}" class="card-img-top" alt="character">
        <div class="card-body">
            <h5 class="card-title">{{$character['name']}}</h5>
            
            <span class="bullet">Location: {{$character['location']}}</span>
            <span class="bullet">Origin: {{$character['origin']}}</span>
            <span class="bullet">Status: {{$character['status']}}</span>
            <span class="bullet">Species: {{$character['species']}}</span>
            <span class="bullet">Type: {{$character['Type']}}</span>
            <span class="bullet">Gender: {{$character['gender']}}</span>
            
        </div>
    </div>
    @endforeach
    </section>
</x-app>
