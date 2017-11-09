(function($) {
 $(function() {
   // start functions when DOM loads
   $(document).ready(function(){
      // click event to drop down category checkbox list
      $('#ssselect_category').on('click', function () {
        $('#sselect_category_list').slideToggle();
      })
   });
 });
})(jQuery);
