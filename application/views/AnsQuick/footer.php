</body>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
			<script src="//code.jquery.com/jquery-1.10.2.js"></script>
			<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script src="<?php echo base_url('js/index.js'); ?>"></script>

<script type="text/javascript">

jQuery(document).ready(function(){
//alert("heelffflo");
                function split( val ) {
                    return val.split( /,\s*/ );
                }
                function extractLast( term ) {
                    return split( term ).pop();
                }

                $('#tags').autocomplete({

                //  alert("nice");
                    minLength : 1,
                    source: function( request, response ) {
                              $.getJSON( "index.php/TagSuggester", {
                                  term: extractLast( request.term )
                              }, response );
                            },
										appendTo : $('#postQ'),
										autoFocus:true,
                    select: function( event, ui ) {
											//alert("asd");
                              var terms = split( this.value );
                              // remove the current input
                              terms.pop();
                              // add the selected item
                              terms.push( ui.item.value );
                              // add placeholder to get the comma-and-space at the end
                              terms.push( "" );
                              this.value = terms.join( ", " );
                              return false;
                             }


              });


});

</script>

</html>