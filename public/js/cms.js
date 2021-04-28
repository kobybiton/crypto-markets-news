$('.alert').hide();

$('body').on('click','.upload',function(e){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(this).parents('form').ajaxForm(options);
});

var options = {

    success: function(response){

        if(response === 'success'){
            console.log('response - ' + response);
            $('.alert.success').slideDown().delay(5000).slideUp(300);
            $('input').val('');
            $('textarea').val('');
            $('#editor').summernote('reset');
            $(".snippet-image, .article-image, .banner-image").slideUp();
        }
        else{
            console.log('error - ' + response);
            $('.alert.error').text(response).slideDown().delay(5000).slideUp(300);
        }
    },

    error: function(error){
        console.log('error - ' + JSON.stringify(error));
       $('.alert.error').slideDown().delay(5000).slideUp(300);
    }
};

var table = $('table').DataTable({
    'bSort' : false
});

$(".banners-tbody").sortable({

    cancel: ".disable-sort",

    create: function( event, ui ){
        //let sortedElementText = ui.item.children()[0].innerHTML;

    },

    start: function(event, ui){

        //let sortedElementText = ui.item.children()[0].innerHTML;
        //table.column(0).search(sortedElementText, true, false).draw();
    },

    stop: function (event, ui) {

        $.map($(this).find('tr'), function(el){
            let id = $(el).data('id');
            let sort = $(el).index();
            let url = 'sort-banners';
            let methodType = "POST";
            handleRow(url, id, methodType, sort);
        });

        setTimeout(function(){
            location.reload();
        }, 2000);

    }
});

$('#editor').summernote({
    placeholder: 'Add New Article',
    tabsize: 1,
    height: 150,
    toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'clear']],
        ['fontname', ['fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'hr']],
        ['view', ['fullscreen', 'codeview']],
        ['help', ['help']]
    ],
    styleTags: ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6']
});

$('body').on('click', '.archive, .restore', function(e){

    let id = $(this).data("id");
    let url = $(this).data("url");
    let methodType = $(this).data("method");
    handleRow(url, id, methodType);
});

function handleRow(url, id, methodType, sort = 0){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        url: url + '/' + id,
        type: methodType,
        dataType: 'JSON',
        data: {
            'id': id,
            'sort': sort
        },
        success: function(response){

            if(id === response.id){
                $('tr[data-id="'+ id +'"]').fadeOut();
            }
        }
    });
}

if($('#title').val()){
    let titleLength = $('#title').val().length;
    $('.title.characters-left span').text(120 - titleLength);
}

if($('#sub_title').val()){
    let subTitleLength = $('#sub_title').val().length;
    $('.sub-title.characters-left span').text(120 - subTitleLength);
}

$('#title, #sub_title').on('input', function(){
    console.log($(this).attr('maxlength'))
    let charactersLeft = $(this).attr('maxlength') - $(this).val().length;
    $(this).next().children().text(charactersLeft);
});

function readURL(input){

  if(input.files && input.files[0]){
    var reader = new FileReader();

    reader.onload = function(e){
      $(input).next().next().css('display', 'block');
      $(input).next().next().attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$("#image").change(function(){
    readURL(this);
});



/*ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
        console.error( error );
    } );*/
































