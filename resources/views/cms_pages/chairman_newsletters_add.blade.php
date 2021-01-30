@extends('layouts.layout')
@section('page_title','Chairman NewsLetters : : Omniyat')
@section('page_content')
    <style>
        #cke_1_contents{
            height: 200px !important;
        }
    </style>
    <div class="row page-title-header">
        <div class="col-12">
            <div class="page-header">
                <h4 class="page-title" style="white-space: nowrap;">Chairman NewsLetters</h4>
            </div>
        </div>
    </div>
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="d-flex card">
                        <div class="card-header">
                            <h5 class="card-title">Add Chairman NewsLetters</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{route('contactus.save')}}" enctype="multipart/form-data" class="row" method="post">
                                {{csrf_field()}}

                                <div class="form-group col-md-12">
                                    <label>Image <span class="text-danger">*</span></label>
                                    <input type="file" required name="image" accept=".png,.jpeg,.jpg" style="padding: 6px" class="form-control">
                                    @if($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-12 chairmainNewsLettersBox">
                                    <h5>Location</h5>
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <input type="text" class="form-control" name="title[]" required placeholder="Title">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <input type="text" class="form-control" name="Subtitle[]" required placeholder="Title">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <textarea class="form-control" name="description[]" required rows="2" placeholder="Description"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <a href="javascript:0;" class="btn btn-success location_addBtn"> + </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <input type="submit" value="Save" class="btn btn-success pull-left">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">

    function addDynamicFields(addButtonClass, fieldWrapper, numFields, fieldHTML, removeButtonClass){
        var maxField = numFields; //Input fields increment limitation
        var addButton = $(addButtonClass); //Add button selector
        var wrapper = $(fieldWrapper); //Input field wrapper

        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });
        
        //Once remove button is clicked
        $(wrapper).on('click', removeButtonClass, function(e){
            e.preventDefault();
            $(this).parent().parent().remove(); //Remove field html
            x--; //Decrement field counter
        });
    }

    var chairmanNewsLettersFieldHTML = '<div class="row"><div class="col-md-11"><div class="row"><div class="form-group col-md-12"><input type="text" class="form-control" name="locationTitle[]" required placeholder="Title"></div><div class="form-group col-md-12"><textarea class="form-control" name="locationAddress[]" required rows="2" placeholder="Address"></textarea></div></div></div><div class="col-md-1"><a href="javascript:0;" class="btn btn-success location_removeBtn"> - </a></div></div>'; //New input field html
    addDynamicFields('.location_addBtn', '.chairmainNewsLettersBox', 2, chairmanNewsLettersFieldHTML, '.location_removeBtn');

</script>
@endsection