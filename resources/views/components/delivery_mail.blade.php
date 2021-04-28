<form id="subscribe_form" class="offset-top-20 rd-mailform-inline rd-mailform form-inline-flex reveal-xs-flex" data-form-output="form-output-global" data-form-type="subscribe" method="post" action="{{ url('store-delivery-mail') }}">
    <div class="form-wrap mfInput">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input class="form-input email" id="subscribe-form-email" type="email" name="email" placeholder="Your E-mail">
        <div class="alert success-subscribe subscribe alert-primary"><b>Thank you for subscribing!</b></div>
        <div class="alert error-subscribe alert-danger"></div>
    </div>
    <button type="submit" class="btn btn-warning subscribe-submit">Subscribe</button>
</form>

@push('script')

    <script>

        $('#subscribe_form .error-subscribe').hide();
        $('#subscribe_form .success-subscribe').hide();

        $('#subscribe_form .subscribe-submit').on('click', function(e){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'JSON'
            });

            var options = {

                success: function(response){

                    if(response.status === 'success'){
                        $('#subscribe_form .success-subscribe').slideDown().delay(2000).slideUp(300);
                        $('input[type=email]').val('');
                    }
                    else{
                        $('#subscribe_form .error-subscribe').text(response).slideDown().delay(2000).slideUp(300);
                    }
                },

                error: function(error){
                    $('#subscribe_form .error-subscribe').text(error.responseText).slideDown().delay(2000).slideUp(300);
                }
            };

            $(this).parents('#subscribe_form').ajaxForm(options);
        });

    </script>

@endpush
