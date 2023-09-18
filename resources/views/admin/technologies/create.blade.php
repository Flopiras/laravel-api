@extends('layouts.app')

@section('title', 'Crea nuova tecnologia')

@section('content')
  {{-- back button --}}
  <a href="{{ route('admin.technologies.index') }}" class="btn btn-secondary mt-4"><i class="fas fa-arrow-left"></i> Torna
    alle tecnologie</a>

  {{-- form --}}
  <form method="POST" action="{{ route('admin.technologies.store') }}" class="mt-4" enctype="multipart/form-data">
    {{-- token --}}
    @csrf

    <div class="row">

      {{-- label --}}
      <div class="col-7">
        <div class="mb-3">
          <label for="label" class="form-label fw-bold">Titolo</label>
          <input type="text" name="label" class="form-control @error('label') is-invalid @enderror" id="label"
            maxlength="50" placeholder="Inserisci un titolo" value="{{ old('label', $technology->label) }}" required>

          {{-- error message --}}
          @error('label')
            <div id="labelFeedback" class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

      </div>

      {{-- submit button --}}
      <div class="d-flex justify-content-end">
        <button class="btn btn-success">Salva</button>
      </div>
  </form>
@endsection
