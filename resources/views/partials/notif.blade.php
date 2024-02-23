@if (Session::has('error'))
    <div class="alert alert-outline-danger fade show" role="alert">
        <div class="alert-icon"><i class="flaticon-bell"></i></div>
        <div class="alert-text">
            @if (Session::get('error') == 'Something when Wrong. Please try again.' ||
                    Session::get('error') == 'Something when Wrong. Cannot Delete This Account')
                {{ Session::get('error') }}
            @else
                <ul>
                    @foreach (Session::get('error') as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="la la-close"></i></span>
            </button>
        </div>
    </div>
    {{-- <div class="m-content" style="margin-bottom:-30px !important">
		<div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: -20px; margin-bottom:3rem">
			<div class="m-alert__icon">
				<i class="flaticon-alert-1"></i>
				<span></span>
			</div>
			<div class="m-alert__text">
				<strong>
					Error!
				<br>
				</strong>
				@if (Session::get('error') == 'Something when Wrong. Please try again.' || Session::get('error') == 'Something when Wrong. Cannot Delete This Account')
					{{Session::get('error')}}
				@else
					@foreach (Session::get('error') as $e)
					- {{$e}} <br/>
					@endforeach
				@endif
			</div>
		</div>
	</div> --}}
    <?php Session::forget('error'); ?>
@endif

@if (Session::has('success'))
    <div class="alert alert-outline-success fade show" role="alert">
        <div class="alert-icon"><i class="flaticon-bell"></i></div>
        <div class="alert-text">
            @foreach (Session::get('success') as $s)
                - {{ $s }} <br />
            @endforeach
        </div>
        <div class="alert-close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true"><i class="la la-close"></i></span>
            </button>
        </div>
    </div>
    {{-- <div class="m-content" style="margin-bottom:-30px !important">
		<div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-success alert-dismissible fade show" role="alert" style="margin-top: -20px; margin-bottom:3rem">
			<div class="m-alert__icon">
				<i class="flaticon-alert-1"></i>
				<span></span>
			</div>
			<div class="m-alert__text">
				<strong>
					Success!
				</strong>
				@foreach (Session::get('success') as $s)
				 - {{$s}} <br/>
				@endforeach
			</div>
		</div>
	</div> --}}
    <?php Session::forget('success'); ?>
@endif

@if (Session::has('warning'))
    <div class="m-content" style="margin-bottom:-30px !important">
        <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-success alert-dismissible fade show"
            role="alert" style="margin-top: -20px; margin-bottom:3rem">
            <div class="m-alert__icon">
                <i class="flaticon-exclamation-square"></i>
                <span></span>
            </div>
            <div class="m-alert__text">
                <strong>
                    Warning!
                </strong>
                @foreach (Session::get('warning') as $s)
                    - {{ $s }} <br />
                @endforeach
            </div>
        </div>
    </div>
    <?php Session::forget('warning'); ?>
@endif
