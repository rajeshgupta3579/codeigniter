<footer class="footer" style="position:absolute; bottom:0" ;>
      <div class="container">
        <p class="text-muted">Place sticky footer content here.</p>
      </div>
    </footer>
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
                              $.getJSON( "http://www.AnsQuick.com/index.php/TagSuggester", {
                                  term: extractLast( request.term )
                              }, response );
                            },
										appendTo : $('#postQuestionForm'),
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





        var URL_PREFIX="http://localhost:8983/solr/collection1/suggest?suggest=true&suggest.build=true&suggest.dictionary=mySuggester&wt=json&suggest.q=";
        var a = "http://localhost:8983/solr/jcg/select?q=name:";
        var URL_SUFFIX = "";
        $("#searchBox").autocomplete({
          minLength : 1,
          source: function( request, response ) {
                    $.getJSON( "http://www.AnsQuick.com/index.php/TagSuggester", {
                        term: extractLast( request.term )
                    }, response );
                  },
          appendTo : $('#searchBoxForm'),
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
