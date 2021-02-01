<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function sentContactMails(formId, btnId, feedbackId=null,downloadFile=null){
        $("#"+formId).submit(function(eve){
            eve.preventDefault();
            //alert("+++");
            //console.log($("#contactFormSubmit").serialize());
            $("#"+btnId).text('Sending please wait...');
            $.ajax( {
                url: "{{route('save.contact.inquire.details')}}",
                method: "post",
                data: $("#"+formId).serialize(),
                dataType: "JSON",
                success: function(strMessage) {
                    console.log(strMessage);
                    $("#"+btnId).text('Inquire more');
                    if(strMessage.response == true){
                        swal({
                            //title: "Good job!",
                            text: strMessage.message,
                            icon: "success",
                            button: "Close"
                        });
                        //$("#"+feedbackId).text(strMessage.message);
                    }else{
                        swal({
                            //title: "Good job!",
                            text: strMessage.message,
                            icon: "error",
                            button: "Close"
                        });
                        //$("#"+feedbackId).text(strMessage.message);
                    }
                    $("#"+formId).trigger('reset');
                    setTimeout(function(){ $("#"+feedbackId).text(''); }, 2000);
                }
            });
        });
    }
</script>