<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ? old('name') : (isset($character) ? $character->name : '') }}">
    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="mb-3">
    <label for="type" class="form-label">Type</label>
    <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" value="{{ old('type') ? old('type') : (isset($character) ? $character->type : '') }}">
    @error('type')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="mb-3">
    <label for="dimension" class="form-label">Dimension</label>
    <input type="text" name="dimension" class="form-control @error('dimension') is-invalid @enderror" value="{{ old('dimension') ? old('dimension') : (isset($character) ? $character->dimension : '') }}">
    @error('dimension')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

<div class="mb-3">
    <label for="character_id" class="form-label">Character</label>
    <select name="character_id" class="form-control @error('character_id') is-invalid @enderror">
        <option value="">Select a Character</option>
        @foreach ($characters as $characterId => $characterName)
        <option value="{{ $characterId }}" @if (old('character_id')==$characterId) selected @elseif (isset($location) && in_array($characterId, $location->residents_ids))
            selected
            @endif
            >
            {{ $characterName }}
        </option>
        @endforeach
    </select>
    @error('character_id')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

{{-- Botones --}}
<div class="mb-3">
    <button type="submit" class="btn btn-primary me-2">Enviar</button>
    <a href="/Location" class="btn btn-danger">Cancelar</a>
</div>