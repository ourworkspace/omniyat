

<div class="row mt-2">
    <div class="col-md-12 addMoreLifestyleFields">
        <div class="row">
            <div class="col-md-11">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Tab Name" name="lifestyle_tab_name[]">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Title" name="lifestyle_title_name[]">
                </div>
                <div class="form-group">
                    <textarea class="form-control" rows="6" id="lifestyleDescription_0" name="lifestyle_description[]" placeholder="Description"></textarea>
                    <script>
                        CKEditorChange('lifestyleDescription_0','myconfigText.js');
                    </script>
                </div>
                <div class="form-group">
                    <label for="lifestyle_gallery_images">Image <span class="text-danger">*</span></label>
                    <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="lifestyle_gallery_images[]" style="padding: 6px" required id="lifestyle_gallery_images">
                </div>
            </div>
            <div class="col-md-1">
                <a href="javascript:0;" class="btn btn-success lifestyle_addBtn"> + </a>
            </div>
        </div>
    </div>
</div>

<script>
    var maxField = 4; //Input fields increment limitation
    var addButton = $('.lifestyle_addBtn'); //Add button selector
    var wrapper = $('.addMoreLifestyleFields'); //Input field wrapper

    var x = 1; //Initial field counter is 1
    function appendFields(x){
        var lifestyleFieldHTML = '<div class="row"><div class="col-md-11"><div class="form-group"><input type="text" class="form-control" placeholder="Tab Name" name="lifestyle_tab_name[]"></div><div class="form-group"><input type="text" class="form-control" placeholder="Title" name="lifestyle_title_name[]"></div><div class="form-group"><textarea class="form-control" rows="6" id="lifestyleDescription_0'+x+'" name="lifestyle_description[]" placeholder="Description"></textarea></div><div class="form-group"><label for="lifestyle_gallery_images">Image <span class="text-danger">*</span></label><input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="lifestyle_gallery_images[]" style="padding: 6px" required id="lifestyle_gallery_images"></div></div><div class="col-md-1"><a href="javascript:0;" class="btn btn-success lifestyle_removeBtn"> - </a></div></div>'; //New input field html
        return lifestyleFieldHTML;
    }

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        //if(x < maxField){ 
            x++; //Increment field counter
            var dhtml = appendFields(x);
            $(wrapper).append(dhtml); //Add field html
            CKEditorChange('lifestyleDescription_0'+x,'myconfigText.js');
        //}
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.lifestyle_removeBtn', function(e){
        e.preventDefault();
        $(this).parent().parent().remove(); //Remove field html
        x--; //Decrement field counter
    });
</script>