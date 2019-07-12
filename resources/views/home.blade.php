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
        <div class="col-md-8 col-md-offset-2" style="">
            <div class="panel panel-default">
                <div class="panel-heading">Messages</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                      
                        <div class=" text-center animate " style="margin: 16px auto;overflow: hidden;max-width: 150px;max-height: 150px;border-radius: 50%;cursor: pointer;">
                             <img class = 'img-thumbnail ' style="" src="{{asset('storage/'.auth()->user()->image)}}" alt="...">
                    </div>
                    <div style="margin:36px -7px" class="text-center " >
                        <a href="{{url('messages').'/'.Auth::user()->name.'/'.Auth::user()->id}}" class="alert alert-info">
                          
                          {{url('messages').'/'.Auth::user()->name.'/'.Auth::user()->id}}</a>
                    <h2 class="alert" style="color:#504f4f"><b> Messages</b></h2>
                  </div>
                    @foreach($view as $views)
                       
                     <div class="alert alert-info col-xs-12 text-center " 
                     style="font-size:16px;color:#000!important;display: inline-block;" >
                        {{$views->message}}
                        <a data-toggle="modal" data-target="#myModal{{$views->id}}">

                        <span class="fa fa-trash btn btn-success col-md-1 pull-right">
                         
                     </span>
                     </a>
                     <div class="pull-left" style="font-size:11px">
                        <span class="date" style="" class="pull-left">{{$views->created_at}}</span>
                     </div>
                 </div>
                     <br>
                     <!-- Modal -->
<div id="myModal{{$views->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Message</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this message ?</p>
      </div>
      <div class="modal-footer">
      <form class="form-horizontal" method="post" action="{{url('').'/delete/'.$views->id}}">
        <input type="hidden" value="{{CSRF_TOKEN()}}" name="_token">
        <input type="submit" class="btn btn-primary">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </form>
      </div>
    </div>

  </div>
</div>
                    @endforeach
                    <br>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

