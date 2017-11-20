// self executing function that will run the following functions when the script loads
(function($) {
  // hide all functions running in this file from being accessed through the browser
  $(function() {

     // toggles inputs to be read only or not
     function toggleReadOnly(bool, email, category){
       $(category).prop("readonly", bool);
       $(email).prop("readonly", bool);
     }

     // verify if selection is checked and run the correlating toggle read only function on it
     function verifySelection(){

       // grab input fields related to the selected checkbox
       var $this = $(this);
       var $parentInput = $this.closest('td').siblings();
       var $categoryInput = $parentInput.find('.categories');
       var $emailInput = $parentInput.find('.email');

       // verify checkbox is selected and run toggle read only function on checked input field
       if($this.is(":checked")){
          toggleReadOnly(false, $emailInput, $categoryInput);
       }else{
         toggleReadOnly(true, $emailInput, $categoryInput);
       }

     }

     // execute callback verify selection function when checkbox is selected
     $('.edit_selection[type="checkbox"]').click(verifySelection);

     // set input fields to be read only when the page loads
     toggleReadOnly(true, '.email', '.categories');

   });

 })(jQuery);
