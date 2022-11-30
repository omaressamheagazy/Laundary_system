$('#update_detail').validate({
    ignore:'.ignore',
    errorClass: 'invalid',
    validClass:'success',
    rules:{
        name:{
            request:true,
            minlength:2,
            mixlength:50
        },
        email:{
            request:true,
            minlength:2,
            mixlength:50
        },
        nophone:{
            request:true,
            minlength:2,
            mixlength:50
        },
    },
    messages:{
        name:{
            required:'Please enter name'
        },
        email:{
            required:'Please enter email'
        },
        nophone:{
            required:'Please enter no. phone'
        }, 
    },
    submitHandler:function(form){
        $.LoadingOverlay('show');
        form.submit();
    }
});