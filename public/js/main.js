$( document ).ready(function() {

    $('#search_category_button_id').on('click', function(event) {
        event.preventDefault();
        let id = parseInt($('#category_id_search').val());
        searchCategory(id);
    });

    $('#search_product_button_id').on('click', function(event) {
        event.preventDefault();
        let id = parseInt($('#category_id_search').val());
        let name = $('#name_product_id').val();
        searchProduct(id, name);
    });

    $('.edit-images').on('click', function(event) {
        event.preventDefault();
        let id = parseInt($(this).attr('data-id'));
        let product_id = $('#product_id').val();
        let sort = $('#sort_' + id).val();
        let is_viewer = 0;
        if($('#is_viewer_' + id).is(':checked')) {
            is_viewer = 1;
        }
        editImages(id, sort, is_viewer, product_id);
    });

});

function editImages(id, sort, is_viewer, product_id) {
    $.ajax({
        url: '/dashboard/product-upload/edit-images',
        type: 'POST',
        data: {id : id, sort:  sort, is_viewer : is_viewer, product_id : product_id},
        beforeSend: function() { $('#loader-block-id').show(); },
        complete: function() { $('#loader-block-id').hide();  },
        success: function(response){

        },
        error: function(){
            alert('ошибка');
        }
    });
}


function searchCategory(id) {
    $.ajax({
        url: '/dashboard/category/search',
        type: 'POST',
        data: {id : id},
        beforeSend: function() { $('#loader-block-id').show(); },
        complete: function() { $('#loader-block-id').hide();  },
        success: function(response){
            $('#category_part_view').html('');
            if(response) {
                $('#category_part_view').append(response);
            }
        },
        error: function(){
            alert('ошибка');
        }
    });
}

function searchProduct(id, name) {
    $.ajax({
        url: '/dashboard/product/search',
        type: 'POST',
        data: {id : id, name : name},
        beforeSend: function() { $('#loader-block-id').show(); },
        complete: function() { $('#loader-block-id').hide();  },
        success: function(response){
            $('#product_part_view').html('');
            if(response) {
                $('#product_part_view').append(response);
            }
        },
        error: function(){
            alert('ошибка');
        }
    });
}