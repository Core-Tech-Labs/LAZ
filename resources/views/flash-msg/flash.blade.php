<script type="text/javascript">
        $(document).ready(function($){
            $('div#success').not('.alert-important').delay(3000).slideUp(300);
        });
</script>
@if (Session('success_message'))
            <div id="success" class="alert alert-success {{ Session::has('flash_message_important')? 'alert-important' : '' }}{{-- Example line--}}">
            <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                @if(Session::has('flash_important')) {{-- Example line--}}
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                @endif
                {{ Session::get('success_message') }} {{-- Example line session('success_message') --}}
            </div>
@endif


@if (Session('failure_message'))
        <div id="failure" class="alert alert-danger {{ Session::has('flash_message_important')? 'alert-important' : '' }}">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                {{ Session::get('failure_message') }}
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        </div>
@endif
