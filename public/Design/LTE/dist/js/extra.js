function checkAll(){

    //selector[class attribute and it's value] : type : value
    $('input[class="item_checkbox"]:checkbox').each(function(){
        
        if($('input[class="checkall"]:checkbox:checked'). length == 0){
            //unckeck the selected checkboxes
            $(this).prop('checked', false);
        }

        else{
            //ckeck all checkboxes
            $(this).prop('checked', true);
        }
    });
}

function deleteAll(){
    $(document).on('click', '.delAll', function(){
        $('#form_data').submit();
    });

    $(document).on('click', '.delBtn', function(){
        var itemChecked = $('input[class="item_checkbox"]:checkbox').filter(":checked").length;
        if(itemChecked > 0){
            $('.record_count').text(itemChecked);
            $('.empty_record').addClass('hidden');
            $('.not_empty_record').removeClass('hidden');
        }

        else{
            $('.record_count').text('');
            $('.not_empty_record').addClass('hidden');
            $('.empty_record').removeClass('hidden');
        }

        $('#mutlipleDelete').modal('show');
    });
}