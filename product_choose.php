
<!DOCTYPE html>
<html>
 <head>
  <title>เลือกรหัสเครื่อง</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
 </head>
 <body>
  <br /><br />
  <div class="container">
   <br />
   <h2 align="center">กรุณาเลือกรหัสเครื่อง</h2>
   <br />
   <div class="col-md-4" style="margin-left:200px;">
    <form method="post" id="multiple_select_form">
     <select name="skills" id="skills" class="form-control selectpicker" data-live-search="true" multiple>
      <option value="Python Flask">Python Flask</option>
      <option value="Python Django">Python Django</option>
      <option value="Express.js">Express.js</option>
      <option value="Laravel">Laravel</option>
      <option value="Spring">Spring</option>
      <option value="Angular">Angular</option>
      <option value="React">React</option>
     </select>
     <br /><br />
     <input type="hidden" name="hidden_skills" id="hidden_skills" />
     <input type="submit" name="submit" class="btn btn-info" value="Submit" />
    </form>
    <br />
   </div>
  </div>
  <script>
    $(document).ready(function(){
     $('.selectpicker').selectpicker();
     
     $('#skills').change(function(){
      $('#hidden_skills').val($('#skills').val());
     });
     
     $('#multiple_select_form').on('submit', function(event){
      event.preventDefault();
      if($('#skills').val() != '')
      {
       var form_data = $(this).serialize();
       $.ajax({
        url:"insert.php",
        method:"POST",
        data:form_data,
        success:function(data)
        {
         //console.log(data);
         $('#hidden_skills').val('');
         $('.selectpicker').selectpicker('val', '');
         alert(data);
        }
       })
      }
      else
      {
       alert("Please select framework");
       return false;
      }
     });
    });
    </script>
 </body>
</html>
