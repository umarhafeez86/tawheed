<div class="form-group" id="faqslistrow{{ $rownumber }}">

    <div class="form-group">
        <label class="control-label text-left" style="width:100%">Question <button class="btn btn-danger" style="padding: 4px 13px;float:right;" type="button" onclick="remove_faqslist_fields('{{ $rownumber }}');"> - Remove </button></label>
        <input type="text" name="faqsdetails_question[]" class="form-control" value="{{ old("faqsdetails_question") }}">
    </div>
    <div class="form-group">
        <label class="control-label text-left">Answer</label>
        <textarea id="textarea_editor{{ $rownumber }}" name="faqsdetails_answer[]" class="textarea_editor form-control" rows="5">{{ old("faqsdetails_answer") }}</textarea>
    </div>
    <div class="form-group">
        <label class="control-label text-left">Sort</label>
        <input type="text" name="faqsdetails_sort[]" class="form-control" value="{{ old("faqsdetails_sort") }}">
    </div>
    <div class="form-group">
        <label class="control-label mb-10 text-left">Status</label>
        <select name="status[]" class="form-control">
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