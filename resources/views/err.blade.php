<div class="container" style="margin-top: 80px">
    @error('name')
    <div class="alert alert-warning" role="alert">
        {{$message}}
    </div>
    @enderror
    @error('email')
    <div class="alert alert-warning" role="alert">
        {{$message}}
    </div>
    @enderror
    @error('password')
    <div class="alert alert-warning" role="alert">
        {{$message}}
    </div>
    @enderror
    @error('error')
    <div class="alert alert-warning" role="alert">
        {{$message}}
    </div>
    @enderror
    @error('rules')
    <div class="alert alert-warning" role="alert">
        {{$message}}
    </div>
    @enderror
    @error('success')
    <div class="alert alert-success" role="alert">
        {{$message}}
    </div>
    @enderror
</div>
