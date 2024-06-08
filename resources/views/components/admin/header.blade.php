<div class="container col-md-10 text-center mb-5">
    <div class="row ">
        <div class="col-11">
            <center>
                @if(isset(auth()->user()->business->logo))
                    <img src="{{ asset('storage/' . auth()->user()->business->logo) }}" class="rounded-circle" alt="employee-image" width="100" height="100">
                @else
                    <i class="far fa-home" style="font-size: 80px"></i>
                @endif
                
                <h2 class="fw-bold text-white mt-2 mb-0">{{auth()->user()->business->title}}</h2>
                <p class="text-white mt-0">{{auth()->user()->business->address}}</p>
            </center>
        </div>
    </div>
    <!-- <h5 class="text-white">Admin Section</h5> -->
</div>