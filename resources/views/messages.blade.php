@extends('layouts.app')
@section('content')
<script type="text/javascript">
  $(function(){
    $('.animate').click(function(){
      if (!$(this).hasClass('clicked')) {

      $(this).animate({'max-height': '500px','max-width' : '500px','border-radius' : '0%'}).addClass('clicked'); 
      }else{
        
        $(this).animate({'max-height': '150px','max-width' : '150px','border-radius' : '50%'}).removeClass('clicked');
      }
    });
  });
</script>
<div class="container">
	<div class="row">
        <div class="col-md-8 col-md-offset-2">
             <div class=" text-center " style="margin: 5px 0;">
                <img class = 'img-thumbnail animate' style="max-width: 150px;max-height: 150px;border-radius: 50%;cursor: pointer;" src="{{asset('storage/'.auth()->user()->image)}}" alt="...">
            </div>
      <form class="form-horizontal col-md-8 col-md-offset-2 " method="post" >
        		<div class="form-group">
        			<input type="hidden" value="{{CSRF_TOKEN()}}" name="_token">
        		</div>
        		<div class="form-group">
        			<input type="hidden" name="sender_id" class='form-control' value="{{auth()->user()->id}}">
        		</div>
        		<div class="form-group">
        			<input type="hidden" name="reciver_id" class='form-control' value="{{$id}}">
        		</div>
        		<div class="form-group ">
        			<label>Send a message to {{$name}}</label>
        			<textarea name="message" class='form-control ' rows="6" style="resize:none" required></textarea>
        		</div>
        		<div class="form-group">
        		<input type="submit" class="btn btn-info btn-center " style="text-align: center">
        		</div>
        	</form>
        </div>
    </div>
</div>

@endsection
