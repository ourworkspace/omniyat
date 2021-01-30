@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible">
        <a href="javasctipt:(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session()->get('success') }}
    </div>
@endif
@if(session()->has('failed'))
    <div class="alert alert-warning alert-dismissible">
        <a href="javasctipt:(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session()->get('failed') }}
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible">
        <a href="javasctipt:(0);" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session()->get('error') }}
    </div>
@endif