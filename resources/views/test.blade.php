<html>
   <head>
      <title>Ajax Example</title>
      
      <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
      
      <script>
         $(document).ready(function () {
            $('.selectResulte').on('change',function(e) {
                var resulte = 'e.target.value';

            $.ajax({
               type:'POST',
               url:'/reservation/resulte/update',
               data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {

                                          console.log('data');  

               }
            });
        });
        });
         
      </script>
   </head>
   
   <body>
      <div id = 'msg'>This message will be replaced using Ajax. 
         Click the button to replace the message.</div>
      <?php
         echo Form::button('Replace Message',['onClick'=>'getMessage()']);
      ?>
   </body>

</html>