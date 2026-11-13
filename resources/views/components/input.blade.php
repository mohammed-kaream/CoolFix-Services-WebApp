<div class="form-group col-md-6">
    <input style="color:#000000; font-size:20px; " type="{{ $type }}" name="{{ $name }}" value="{{ old($name) }}"
        class="form-control
        @error($name) is-invalid  @enderror" required="required"
        placeholder="{{ $placeholder }}" >

    @error($name)
        <small class="text-danger ">{{ $message }}</small>
        {{-- <small style="color: blueviolet" class="t">{{ $message }}</small> --}}
    @enderror
</div>
