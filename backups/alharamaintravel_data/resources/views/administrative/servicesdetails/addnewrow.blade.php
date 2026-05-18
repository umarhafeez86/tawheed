<div class="form-group" id="serviceslistrow{{ $rownumber }}">

    <div class="form-group">
        <label class="control-label text-left">Details</label>
        <textarea id="textarea_editor{{ $rownumber }}" name="servicesdetails_details[]" class="textarea_editor form-control" rows="5">{{ old("servicesdetails_details") }}</textarea>
    </div>
    <div class="form-group">
        <label class="control-label mb-10 text-left">Image</label>
        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
          <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
          <span class="input-group-addon fileupload btn btn-info btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Select file</span> <span class="fileinput-exists btn-text">Change</span>
          <input type="file" name="servicesdetails_image[]">
          </span> <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text"> Remove</span></a> 
        </div>
      </div>
    <div class="form-group">
        <label class="control-label text-left">Sort</label>
        <input type="text" name="servicesdetails_sort[]" class="form-control" value="{{ old("servicesdetails_sort") }}">
    </div>
    <div class="form-group">
        <label class="control-label mb-10 text-left">Status</label>
        <select name="servicesdetails_status[]" class="form-control">
            <option value="1">Enabled</option>
            <option value="0">Disabled</option>
        </select>	
    </div>

</div>

<script>
$('#textarea_editor{{ $rownumber }}').wysihtml5({
		toolbar: {
		  fa: true,
		  "link": true,
		}
});
</script>