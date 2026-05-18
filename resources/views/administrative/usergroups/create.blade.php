@extends('administrative.layouts.main')

@section('main-container')
<div class="container-fluid">
					
  <!-- Title -->
  <div class="row heading-bg">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
      <h5 class="txt-dark"><?=$page_name?></h5>
    </div>
    <!-- Breadcrumb -->
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
      <ol class="breadcrumb">
      <li><a href="{{ url('administrative/dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ url('administrative/usergroups/index') }}">{{ $page_name }}</a></li>
      <li class="active"><span>{{ $subpage_name }}</span></li>
      </ol>
    </div>
    <!-- /Breadcrumb -->
  </div>
        
  <!-- /Title -->
  
  <!-- Row -->
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default card-view">
        <div class="panel-heading">
          <div class="pull-left">
            <h6 class="panel-title txt-dark">{{ $subpage_name }}</h6>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="panel-wrapper collapse in">
          <div class="panel-body">
            <div class="form-wrap">
                                
              <form data-toggle="validator" novalidate="true" action="{{ route("administrative.usergroups.store") }}" method="post" enctype="multipart/form-data" >
              @csrf
                <div class="form-group">
                  <label class="control-label mb-10 text-left">Name</label>
                  <input type="text" name="usergroups_name" class="form-control @error("usergroups_name") is-invalid @enderror" data-error="Value Required." value="{{ old("usergroups_name") }}" required >
                                            <div class="help-block with-errors"></div>
                                            @error("usergroups_name")
                                            <p class="invalid-feedback">{{ $message }}</p>
                                            @enderror
                </div>
                                        
                <div class="form-group">
                  <label class="control-label mb-10 text-left">Details</label>
                  <textarea name="usergroups_descp" class="textarea_editor form-control" rows="5">{{ old("usergroups_descp") }}</textarea>
                </div>
                                                                            
                <div class="form-group">
                  <label class="control-label mb-10 text-left"><strong style="color:#ff0000">Navigation</strong></label>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
<strong style="color:#ff0000"><input type="checkbox" id="selectAll"> Select All</strong>
@php
use App\Models\Wlusergroups;
use App\Models\Wlleftmenu;

$leftmenus = Wlleftmenu::tree();
@endphp        
@foreach ($leftmenus as $leftmenu)

        @if (count($leftmenu->children) > 0)
        <h3 style="font-size:18px;line-height:20px;">&raquo; {{ $leftmenu->leftmenu_name }}
                 
                 
          <table width="200" border="0" cellspacing="0" cellpadding="0" style="float:right">
            <tr>
              <td><input type="checkbox" name="usergroups_permissions[]" value="{{ $leftmenu->leftmenuid }}_v">View</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table>
                           
        </h3>
        <div class="clearfix"></div>  

        @foreach ($leftmenu->children as $Subleftmenu) 
        <h2 style="font-size:12px;padding-left:20px;line-height:20px;">{{ $Subleftmenu->leftmenu_name }}
          <table width="200" border="0" cellspacing="0" cellpadding="0" style="float:right">
            <tr>
              <td><input type="checkbox" name="usergroups_permissions[]" value="{{ $Subleftmenu->leftmenuid }}_v">View</td>
              <td><input type="checkbox" name="usergroups_permissions[]" value="{{ $Subleftmenu->leftmenuid }}_a">Add</td>
              <td><input type="checkbox" name="usergroups_permissions[]" value="{{ $Subleftmenu->leftmenuid }}_e">Edit</td>
              <td><input type="checkbox" name="usergroups_permissions[]" value="{{ $Subleftmenu->leftmenuid }}_d">Del</td>
            </tr>
          </table>	
          
        </h2>	
        <div class="clearfix"></div>        
        @endforeach

        @else
        <h3 style="font-size:18px;line-height:20px;">&raquo; {{ $leftmenu->leftmenu_name }}
                 
          <table width="200" border="0" cellspacing="0" cellpadding="0" style="float:right">
            <tr>
              <td><input type="checkbox" name="usergroups_permissions[]" value="{{ $leftmenu->leftmenuid }}_v">View</td>
              <td><input type="checkbox" name="usergroups_permissions[]" value="{{ $leftmenu->leftmenuid }}_a">Add</td>
              <td><input type="checkbox" name="usergroups_permissions[]" value="{{ $leftmenu->leftmenuid }}_e">Edit</td>
              <td><input type="checkbox" name="usergroups_permissions[]" value="{{ $leftmenu->leftmenuid }}_d">Del</td>
            </tr>
          </table>
                           
        </h3>
        <div class="clearfix"></div> 
        @endif

@endforeach
        
</td>
</tr>
</table>
                </div>
                <div class="form-group">
                  <label class="control-label mb-10 text-left">Status</label>
                  <div class="radio radio-info">
                    <input type="radio" name="usergroups_status" id="radio1" value="1" @if (old("usergroups_status") == 1) checked @endif >
                    <label for="radio1">
                      Enable
                    </label>
                  </div>
                  <div class="radio radio-info">
                    <input type="radio" name="usergroups_status" id="radio2" value="0" @if (old("usergroups_status") != 1) checked @endif>
                    <label for="radio2">
                      Disable
                    </label>
                  </div>	
                </div>
              
<div class="form-group mb-0">
      <button type="submit" class="btn btn-success btn-anim"><i class="icon-rocket"></i><span class="btn-text">submit</span></button>
</div>
                                        
                                        
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /Row -->
</div>
@endsection