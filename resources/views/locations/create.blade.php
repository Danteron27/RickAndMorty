<x-app>
<section class="container my-5">
        <div class="card">
            <div class="card-header">
                <h2>Create Location</h2>
            </div>
            <div class="card-body">
                <form action="{{route('location.create.post')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <x-location.form-location :location="$location" :characters="$characters" />
                </form>
            </div>
        </div>
    </section>
</x-app>