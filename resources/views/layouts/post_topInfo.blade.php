@if (session('msg_ok')|| session('msg_no') || $errors->any())
<section class="content-wrap" style="margin-bottom: 20px;">
    <div class="container">
        <div class="row" >
            <main class="col-md-12">
                @if(session('msg_no'))
                    <div class="alert alert-danger alert-msg text-center" role="alert" style="border-radius: 0;margin:0 auto;width:100%;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>{{ session('msg_no') }}</strong>
                    </div>
                @endif
                @if(session('msg_ok'))
                    <div class="alert alert-info alert-msg" role="alert" style="border-radius: 0;margin:0 auto;width:100%;text-align: center;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>{{ session('msg_ok') }}</strong>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger alert-msg"  style="border-radius: 0;margin:0 auto;width:100%;text-align: center">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </main>
        </div><!--end row-->
    </div>
</section>
@endif