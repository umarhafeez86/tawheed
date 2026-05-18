@extends('administrative.layouts.maindashboard')

@section('main-container')
<script src="{{ url('Highcharts/code/highcharts.js') }}"></script>
<script src="{{ url('Highcharts/code/modules/exporting.js') }}"></script>
<style type="text/css">
.notepad, .notepad>* {
margin: 0;
padding: 0;
overflow: auto;
}
.notepad {
background: url('middle-part.png');
}
.notepad header {
background: url('top-part.png');
}
.notepad footer {
background: url('curl-part.png');
float: right;
/* Set a correct size as well. */
}
</style>
<div class="container-fluid pt-25">
&nbsp;
</div>
<!-- ////////////////////////////////////////////////////////////////////////////////////////

Personal User

////////////////////////////////////////////////////////////////////////////////////// -->

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
@endsection