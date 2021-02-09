<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function sentContactMails(formId, btnId, feedbackId=null, downloadFile=null, downloadLink = null,btnName=null){
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
                    if(btnName != null || btnName != ''){
                        $("#"+btnId).text(btnName);
                    }else{
                        $("#"+btnId).text('Inquire more');
                    }
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
                    setTimeout(function(){ 
                        $("#"+feedbackId).text(''); 
                        $('#download_modal').modal('hide'); 
                        $('#download_modal_1').modal('hide'); 
                    }, 2000);
                }
            });
        });
    }

    /* Helper function */
    function download_file(fileURL, fileName) {
        // for non-IE
        if (!window.ActiveXObject) {
            var save = document.createElement('a');
            save.href = fileURL;
            save.target = '_blank';
            var filename = fileURL.substring(fileURL.lastIndexOf('/')+1);
            save.download = fileName || filename;
            if ( navigator.userAgent.toLowerCase().match(/(ipad|iphone|safari)/) && navigator.userAgent.search("Chrome") < 0) {
                document.location = save.href; 
                // window event not working here
            }else{
                var evt = new MouseEvent('click', {
                    'view': window,
                    'bubbles': true,
                    'cancelable': false
                });
                save.dispatchEvent(evt);
                (window.URL || window.webkitURL).revokeObjectURL(save.href);
            }	
        }
        // for IE < 11
        else if ( !! window.ActiveXObject && document.execCommand)     {
            var _window = window.open(fileURL, '_blank');
            _window.document.close();
            _window.document.execCommand('SaveAs', true, fileName || fileURL)
            _window.close();
        }

    }
</script>   