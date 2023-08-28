<div class="mb-3">
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')? old('name'): (isset($character)? $character->name: '')}}">
    @error('name')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

 
  <div class="mb-3">
    <label for="location_id" class="form-label">Location</label>
    <select name="location_id" class="form-control @error('location_id') is-invalid @enderror">
        <option value="">Select a Location</option>
        @foreach ($locations as $locationId => $locationName)
            <option value="{{ $locationId }}"
                @if (old('location_id') == $locationId)
                    selected
                @elseif (isset($character) && $character->location_id == $locationId)
                    selected
                @endif
            >
                {{ $locationName }}
            </option>
        @endforeach
    </select>
    @error('location_id')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="mb-3">
    <label for="origin_id" class="form-label">Origin</label>
    <select name="origin_id" class="form-control @error('origin_id') is-invalid @enderror">
        <option value="">Select an Origin</option>
        @foreach ($origins as $originId => $originName)
            <option value="{{ $originId }}"
                @if (old('origin_id') == $originId)
                    selected
                @elseif (isset($character) && $character->origin_id == $originId)
                    selected
                @endif
            >
                {{ $originName }}
            </option>
        @endforeach
    </select>
    @error('origin_id')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" class="form-control @error('status') is-invalid @enderror">
        <option value="">Select a Status</option>
        @foreach (['Alive', 'Dead', 'unknown'] as $statusOption)
            <option value="{{ $statusOption }}"
                @if (old('status') == $statusOption)
                    selected
                @elseif (isset($character) && $character->status == $statusOption)
                    selected
                @endif
            >
                {{ $statusOption }}
            </option>
        @endforeach
    </select>
    @error('status')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="mb-3">
    <label for="species" class="form-label">Species</label>
    <select name="species" class="form-control @error('species') is-invalid @enderror">
        <option value="">Select a Species</option>
        @foreach (['Alien', 'Animal', 'Cronenberg', 'Disease', 'Human', 'Humanoid', 'Mythological Creature', 'Planet', 'Robot', 'unknown', 'Poopybutthole'] as $speciesOption)
            <option value="{{ $speciesOption }}"
                @if (old('species') == $speciesOption)
                    selected
                @elseif (isset($character) && $character->species == $speciesOption)
                    selected
                @endif
            >
                {{ $speciesOption }}
            </option>
        @endforeach
    </select>
    @error('species')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="mb-3">
    <label for="Type" class="form-label">Type</label>
    <input type="text" name="Type" class="form-control @error('Type') is-invalid @enderror" value="{{old('Type')? old('Type'): (isset($character)? $character->Type: '')}}">
    @error('Type')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

<div class="mb-3">
    <label for="gender" class="form-label">Gender</label>
    <select name="gender" class="form-control @error('gender') is-invalid @enderror">
        <option value="">Select a Gender</option>
        @foreach (['Male', 'Female', 'Genderless', 'unknown'] as $genderOption)
            <option value="{{ $genderOption }}"
                @if (old('gender') == $genderOption)
                    selected
                @elseif (isset($character) && $character->gender == $genderOption)
                    selected
                @endif
            >
                {{ $genderOption }}
            </option>
        @endforeach
    </select>
    @error('gender')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>



<div class="mb-3">
    <label for="name" class="form-label">Image Link</label>
    <input type="text" name="image" class="form-control @error('image') is-invalid @enderror" value="{{old('image')? old('image'): (isset($character)? $character->image: '')}}">
    @error('image')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>
 

  {{-- Botones --}}
  <button type="submit" class="btn btn-primary me-2">Enviar</button>
  <a href="/Character" class="btn btn-danger">Cancelar</a>

  