
@if(isset($portfolio_design))
<div class="row mt-2">
    <div class="col-md-12 addMoreDesignFields">
        @foreach($portfolio_design as $key => $pd_data)
            <div class="row">
                <div class="col-md-11">
                    <div class="form-group col-md-12">
                        <input type="text" class="form-control" value="{{$pd_data->option_title}}" placeholder="Tab Name" name="design_tab_name[]">
                    </div>
                    <div class="form-group col-md-12">
                        <input type="text" class="form-control" value="{{$pd_data->title}}" placeholder="Title" name="design_title_name[]">
                    </div>
                    <div class="form-group col-md-12">
                        <textarea class="form-control" rows="6" id="designDescription_0{{$key}}" name="design_description[]" placeholder="Description">{{$pd_data->description_1}}</textarea>
                        <script>
                            CKEditorChange('designDescription_0{{$key}}','myconfigText.js');
                        </script>
                    </div>
                </div>
                <div class="col-md-1">
                    @if($key == 0)
                        <a href="javascript:0;" class="btn btn-success design_addBtn"> + </a>
                    @else
                        <a href="javascript:0;" class="btn btn-success design_removeBtn"> - </a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@else
<div class="row mt-2">
    <div class="col-md-12 addMoreDesignFields">
        <div class="row">
            <div class="col-md-11">
                <div class="form-group col-md-12">
                    <input type="text" class="form-control" placeholder="Tab Name" name="design_tab_name[]">
                </div>
                <div class="form-group col-md-12">
                    <input type="text" class="form-control" placeholder="Title" name="design_title_name[]">
                </div>
                <div class="form-group col-md-12">
                    <textarea class="form-control" rows="6" id="designDescription_0" name="design_description[]" placeholder="Description"></textarea>
                    <script>
                        CKEditorChange('designDescription_0','myconfigText.js');
                    </script>
                </div>
                <div class="form-group col-md-12">
                    <label for="design_gallery_images">Image <span class="text-danger">*</span></label>
                    <input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="design_gallery_images" style="padding: 6px" required id="design_gallery_images">
                </div>
            </div>
            <div class="col-md-1">
                <a href="javascript:0;" class="btn btn-success design_addBtn"> + </a>
            </div>
        </div>
    </div>
</div>
@endif
<script>
    var maxField = 4; //Input fields increment limitation
    var addButton = $('.design_addBtn'); //Add button selector
    var wrapper = $('.addMoreDesignFields'); //Input field wrapper

    var x = 1; //Initial field counter is 1
    function appendFields(x){
        var designFieldHTML = '<div class="row"><div class="col-md-11"><div class="form-group col-md-12"><input type="text" class="form-control" placeholder="Tab Name" name="design_tab_name[]"></div><div class="form-group col-md-12"><input type="text" class="form-control" placeholder="Title" name="design_title_name[]"></div><div class="form-group col-md-12"><textarea class="form-control" rows="6" id="designDescription_0'+x+'" name="design_description[]" placeholder="Description"></textarea></div><div class="form-group col-md-12"><label for="design_gallery_images">Image <span class="text-danger">*</span></label><input type="file" class="form-control filer_plugin_single" accept=".jpg,.png,.jpeg" name="design_gallery_images" style="padding: 6px" required id="design_gallery_images"></div></div><div class="col-md-1"><a href="javascript:0;" class="btn btn-success design_removeBtn"> - </a></div></div>'; //New input field html
        return designFieldHTML;
    }

    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            var dhtml = appendFields(x);
            $(wrapper).append(dhtml); //Add field html
            CKEditorChange('designDescription_0'+x,'myconfigText.js');
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.design_removeBtn', function(e){
        e.preventDefault();
        $(this).parent().parent().remove(); //Remove field html
        x--; //Decrement field counter
    });
</script>