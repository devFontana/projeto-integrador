@if(session('success'))
    <div class="msg alert alert-success alert-dismissible fade show float-right mb-5" role="alert">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>    
@endif

@if(session('erro'))
    <div class="msg alert alert-danger alert-dismissible fade show float-right mb-5" role="alert">
        {{session('erro')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>    
@endif