@extends('layouts.master')

@section('title', 'Edit Paket Wisata')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">
                    <i class="fas fa-edit"></i> Edit Paket Wisata
                </h4>
            </div>
            <div class="card-body">
                <!-- Validation Errors -->
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <strong><i class="fas fa-exclamation-triangle"></i> Error!</strong>
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- Form -->
                <form action="/paket-wisata/update" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $paket->id_paket }}">
                    
                    <div class="mb-3">
                        <label for="nama_paket" class="form-label">
                            <i class="fas fa-tag"></i> Nama Paket <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               class="form-control @error('nama_paket') is-invalid @enderror" 
                               id="nama_paket" 
                               name="nama_paket" 
                               value="{{ old('nama_paket', $paket->nama_paket) }}"
                               required>
                        @error('nama_paket')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="destinasi" class="form-label">
                            <i class="fas fa-map-marked-alt"></i> Destinasi <span class="text-danger">*</span>
                        </label>
                        <input type="text" 
                               class="form-control @error('destinasi') is-invalid @enderror" 
                               id="destinasi" 
                               name="destinasi" 
                               value="{{ old('destinasi', $paket->destinasi) }}"
                               required>
                        @error('destinasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="harga" class="form-label">
                                    <i class="fas fa-money-bill-wave"></i> Harga (Rp) <span class="text-danger">*</span>
                                </label>
                                <input type="number" 
                                       class="form-control @error('harga') is-invalid @enderror" 
                                       id="harga" 
                                       name="harga" 
                                       value="{{ old('harga', $paket->harga) }}"
                                       min="0"
                                       required>
                                @error('harga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="durasi" class="form-label">
                                    <i class="far fa-calendar-alt"></i> Durasi <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control @error('durasi') is-invalid @enderror" 
                                       id="durasi" 
                                       name="durasi" 
                                       value="{{ old('durasi', $paket->durasi) }}"
                                       required>
                                @error('durasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">
                            <i class="fas fa-align-left"></i> Deskripsi <span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                  id="deskripsi" 
                                  name="deskripsi" 
                                  rows="5" 
                                  required>{{ old('deskripsi', $paket->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">
                            <i class="fas fa-camera"></i> Foto Paket
                        </label>
                        
                        @if($paket->foto)
                        <div class="mb-2">
                            <p class="text-muted mb-1">Foto saat ini:</p>
                            <img src="{{ asset('uploads/paket_wisata/'.$paket->foto) }}" 
                                 alt="{{ $paket->nama_paket }}" 
                                 class="img-thumbnail"
                                 style="max-width: 300px;">
                        </div>
                        @endif
                        
                        <input type="file" 
                               class="form-control @error('foto') is-invalid @enderror" 
                               id="foto" 
                               name="foto" 
                               accept="image/*"
                               onchange="previewImage(event)">
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengubah foto. Format: JPG, JPEG, PNG (Max: 2MB)
                        </small>
                        
                        <!-- Image Preview -->
                        <div id="imagePreview" class="mt-3" style="display: none;">
                            <p class="text-muted mb-1">Preview foto baru:</p>
                            <img id="preview" src="" alt="Preview" class="img-thumbnail" style="max-width: 300px;">
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between">
                        <a href="/paket-wisata" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Data
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview');
        const previewContainer = document.getElementById('imagePreview');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.style.display = 'block';
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection