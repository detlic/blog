<html lang="en">

<head>

  <title>Laravel 5.6 Multiple File Upload Example</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <!-- References: https://github.com/fancyapps/fancyBox -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>


</head>

<body>
  <style type="text/css">
  .gallery
  {
      display: inline-block;
      margin-top: 20px;
  }
  .close-icon{
    border-radius: 50%;
      position: absolute;
      right: 5px;
      top: -10px;
      padding: 5px 8px;
  }
  .form-image-upload{
      background: #e8e8e8 none repeat scroll 0 0;
      padding: 15px;
  }
  </style>


<div class="container lst">



@if (count($errors) > 0)

<div class="alert alert-danger">

    <strong>Sorry!</strong> There were more problems with your HTML input.<br><br>

    <ul>

      @foreach ($errors->all() as $error)

          <li>{{ $error }}</li>

      @endforeach

    </ul>

</div>

@endif



@if(session('success'))

<div class="alert alert-success">

  {{ session('success') }}

</div>

@endif



<h3 class="well">Laravel 5.6 Multiple File Upload</h3>

<form method="post" action="{{url('image_upload')}}" enctype="multipart/form-data">

  {{csrf_field()}}



    <div class="input-group hdtuto control-group lst increment" >

      <input type="file" name="filenames[]" class="myfrm form-control" multiple>

    </div>

    <div class="clone hide">

      <div class="hdtuto control-group lst input-group" style="margin-top:10px">

        <input type="file" name="filenames[]" class="myfrm form-control">

        <div class="input-group-btn">

          <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>

        </div>

      </div>

    </div>



    <button type="submit" class="btn btn-success" style="margin-top:10px">Submit</button>



</form>

</div>
<div class='list-group gallery'>

           @if($images->count())
               @foreach($images as $image)
               <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                   <a class="thumbnail fancybox" rel="ligthbox" href="/files/{{ $image->image }}">
                       <img class="img-responsive" alt="" src="/files/{{ $image->image }}" />
                       <div class='text-center'>
                           <small class='text-muted'>{{ $image->image }}</small>
                       </div> <!-- text-center / end -->
                   </a>
                   <form action="{{ url('file',$image->id) }}" method="POST">
                   <input type="hidden" name="_method" value="delete">
                   {!! csrf_field() !!}
                   <button type="submit" class="close-icon btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
                 </form>
               </div> <!-- col-6 / end -->
               @endforeach
           @endif


    </div> <!-- list-group / end -->
   </div> <!-- row / end -->

</body>

<script type="text/javascript">
    $(document).ready(function(){
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>
</html>
