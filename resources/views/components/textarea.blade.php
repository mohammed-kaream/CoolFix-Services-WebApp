<div class="form-group col-md-12">
    <textarea name="{{ $name }}" rows="6" class="form-control @error($name) is-invalid @enderror"
        style="color: #000000; font-size: 20px;" placeholder="{{ $placeholder ?? '' }}">{{ old($name) }}</textarea>

    @error($name)
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
