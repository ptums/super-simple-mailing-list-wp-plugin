

(function($) {
 $(function() {

   $(document).ready(function(){
       // add additional class for testing
       $('#ssmailing_table').addClass('testing-class');


       //edit row
       $('#ssmailing_edit').on('click', function(){
         console.log("editing function will go here..");
       })
       //delete row
      $('#ssmailing_delete').on('click', function(){
        console.log("deleting function will go here..");
      })
   });

    });
})(jQuery);
