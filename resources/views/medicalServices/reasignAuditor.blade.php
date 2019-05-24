<!-- Content Header (Page header) -->

<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Main content -->
<section class="content" style="width:800px; ">

 <div class="panel-body" >
   <div class="box box-success">
     <div class="box-header with-border">
       <h3 class="box-title">Reasignar Auditor</h3>

     </div>
     <div id="erroralert"class="alert alert-warning alert-dismissible hidden">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <h4><i class="icon fa fa-warning"></i>{{ config('app.name', 'Auditoria anitaria') }} dice:</h4>
       <ul id="errorlist">

           {{-- <li class="error">{{ $error }}</li> --}}

       </ul>
     </div>
         <form  id="reasignAuditorform" method="POST" name='addService'>
           {{ method_field('post') }}
           <div class="box-body">
             <div class="row" id="father">
               @include('medicalServices._reasignAuditorfields')
             </div>
           </div>


           <div class="box-footer">


             <button class="btn btn-primary" id="submit"  name="submit">Reasignar</button>
           </div>
     </form>
      <h3 id="exito" class="box-title hidden">Auditor reasignado correctamente!</h3>
   </div>
 </div>

</section>

<script type="text/javascript">

$(document).ready(function(){
$('#submit').on('click', function(e) {

  var action ='{!! route('update-auditor-medical-service',compact('medicalService')) !!}';
e.preventDefault();
var formdata = $('#reasignAuditorform').serialize();
console.log('this is the form data'+formdata);
$.ajax({

headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 },
 type: 'POST',
 url: '{!! route('update-auditor-medical-service',compact('medicalService')) !!}',
 data: formdata,
 dataType: 'JSON',
 success: function(msg) {
   console.log('succ');
   console.log(msg);
   $('#exito').removeClass("hidden");
   $('#reasignAuditorform').addClass("hidden");
     $('#erroralert').addClass("hidden");
   },
 error: function (msg) {
   $('#errorlist').empty() ;
   $('#erroralert').removeClass("hidden");
   console.log(msg.responseJSON.errors);
   var errors = Object.keys(msg.responseJSON.errors).map(function(key) {
     return [  msg.responseJSON.errors[key]][0][0];
     });
     console.log(errors);
   errors.forEach(function(element) {
       console.log(element);
       var erroritem = document.createElement("li");
       // erroritem.addClass("error");
       erroritem.innerHTML = element;
       $('#errorlist').append(erroritem);
     });
     console.log(msg.responseJSON.errors);
 }

});
});
});
</script>
