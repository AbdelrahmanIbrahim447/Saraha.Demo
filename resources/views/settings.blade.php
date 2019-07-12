@extends('layouts.app')
@section('content')
@push('js')


<script type="text/javascript">

// $
$('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
$('#myTabs a[href="#profile"]').tab('show') // Select tab by name
$('#myTabs a:first').tab('show') // Select first tab
$('#myTabs a:last').tab('show') // Select last tab
$('#myTabs li:eq(2) a').tab('show') // Select third tab (0-indexed)

</script>
<!-- $(function(){
	$('.fake-form').on('submit',function(e){
		e.preventDefault();
	});

$('#submit').click(function(){
     /* when the submit button in the modal is clicked, submit the form */
    //alert('submitting');
    if (true) {}
    $('#form3').submit();
});
});
<div class="container">

	<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    Modal content
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Deactivate Account</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to deactivate your account ?</p>
      </div>
      <div class="modal-footer">
      <form class="form-horizontal fake-form" method="post" action="" >
        <input type="hidden" value="" name="_token">
        <input type="button" id="submit" class="btn btn-primary" value="submit">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </form>
      </div>
    </div>

  </div>
</div>


<div>
-->
  <!-- Nav tabs -->
  <div class="container">
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class='fa fa-user'></i> Personal Information</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class='fa fa-lock'></i> Password</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab"><i class='fa fa-gear'></i> Account setting</a></li>
  </ul>
<br>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
    	@include('layouts.message')
    	<div class="row">
        <div class="col-md-8 col-md-offset-2">
      <form class="" id='form1' method="post" action="{{ url('setting/update/'.auth()->user()->id) }}" enctype="multipart/form-data" >
        		<div class="form-group">
        			<input type="hidden" value="{{CSRF_TOKEN()}}" name="_token">
        		</div>
        		<div class="form-group">
        			<label class="">username</label>
        			<input type="text" min="6" max="255" name="name" class='form-control' value="{{auth()->user()->name}}" required>
        		</div>
        		<div class="form-group">
        			<label class="">email</label>
        			<input type="email" name="email" class='form-control' value="{{auth()->user()->email}}" required>
        		</div>
        		<div class="form-group">
        			<label class="">profile Image</label>
        			<input type="file" name="image" class='form-control' value="">
        		</div>
        		<div class="form-group">
        		<input type="submit"  class="btn btn-info btn-center btn1" style="text-align: center" >
        		</div>
        	</form>
        </div>
    </div>
    </div>

    <div role="tabpanel" class="tab-pane" id="profile">
    	@include('layouts.message')
    	<div class="row">
        <div class="col-md-8 col-md-offset-2">
        	@if(session('failed'))
        	<div class="alert alert-danger">{{session('failed')}}</div>
        	@endif
      <form class="" id='form2' method="post" action="{{ url('setting/update_password/'.auth()->user()->id) }}" >
        		<div class="form-group">
        			<input type="hidden" value="{{CSRF_TOKEN()}}" name="_token">
        		</div>
        		<div class="form-group">
        			<label class="">old password</label>
        			<input type="password" min="6" max="255" name="old_password" class='form-control' value="" required>
        		</div>
        		<div class="form-group">
        			<label class="">new password</label>
        			<input type="password" name="password" class='form-control' value="" required>
        		</div>
        		<div class="form-group">
        			<label class="">password Confirm</label>
        			<input type="password" name="passwordConfirmation" class='form-control' value="" required>
        		</div>
        		<div class="form-group">
        		<button  class="btn btn-info btn-center btn2 " style="text-align: center" >submit</button>
        		</div>
        	</form>
        </div>
    </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="settings">
    	<div class="delete">
    		<div class="row">
        <div class="col-md-8 col-md-offset-2">
        	@if(session('failed'))
        	<div class="alert alert-danger">{{session('failed')}}</div>
        	@endif
      <form class="" id='form3' method="post" action="{{ url('setting/status/'.auth()->user()->id) }}" >
        		<div class="form-group">
        			<input type="hidden" value="{{CSRF_TOKEN()}}" name="_token">
        		</div>

  					  <div class="pretty p-icon p-round p-pulse">
     				   <input type="checkbox" name="status" value="disable">
    			   			 <div class="state p-success-o">
         			   <i class="icon mdi mdi-check"></i>
     			     		  <label>deactive your account?</label>
    				    </div>
   				 </div>
  					  <div class="pretty p-icon p-round p-pulse">
     				   <input type="checkbox" name="delete" value="delete">
     				      <div class="state p-success-o">
      			       <label>delete your account?</label>
    				    </div>
   				 </div>
        		
        		<div class="form-group" style="padding-top: 16px;">
        		<input type="submit" class="btn btn-info stop" style="text-align: center" value="submit">
        		</div>
        	</form>
        </div>
    </div>
    	</div>
    </div>
   
  </div>

</div>
</div>
@endsection