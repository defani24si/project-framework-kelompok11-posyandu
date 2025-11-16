<div class="mb-3">
    <label for="nama" class="form-label">Nama Posyandu</label>
    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $posyandu->nama ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $posyandu->alamat ?? '') }}</textarea>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="rt" class="form-label">RT</label>
            <input type="text" class="form-control" id="rt" name="rt" value="{{ old('rt', $posyandu->rt ?? '') }}" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="rw" class="form-label">RW</label>
            <input type="text" class="form-control" id="rw" name="rw" value="{{ old('rw', $posyandu->rw ?? '') }}" required>
        </div>
    </div>
</div>

<div class="mb-3">
    <label for="kontak" class="form-label">Kontak</label>
    <input type="text" class="form-control" id="kontak" name="kontak" value="{{ old('kontak', $posyandu->kontak ?? '') }}" required>
</div>