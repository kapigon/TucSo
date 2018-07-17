<?php
    /* Paging */
    echo isset($list_pagination) ? $list_pagination : '';
?>

<div class="row">
    <div class="span12">
        <div class="well">
            <center><h3>Copyright &copy; hoalp2908@gmail.com</h3></center>
        </div>
    </div>
</div>

        </div>
    </body>
        <!--<link rel="stylesheet" href="/resources/demos/style.css">-->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/10.1.0/classic/ckeditor.js"></script>
        
        
        <!-- Đánh giá STAR -- >
        <!--<script src="<?php echo base_url() . 'customs/js/jquery.barrating.js' ?>"></script>
        <script src="<?php echo base_url() . 'customs/js/customs.js' ?>"></script> -->
        
        <!-- API Đọc từ -->
        <script src='https://code.responsivevoice.org/responsivevoice.js'></script>
        
        <script type="text/javascript">
            ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .catch( error => {
                    console.error( error );
                } );
                
            $(function() {
               $('#example').barrating({
                 theme: 'fontawesome-stars'
               });
            });
         </script>
        <script  type="text/javascript">
            $( function() {
                var availableTags = [
                  "ActionScript","AppleScript","Asp","BASIC","C","C++","Clojure","COBOL","ColdFusion",
                  "Erlang","Fortran","Groovy","Haskell","Java","JavaScript","Lisp","Perl","PHP",
                  "Python","Ruby","Scala","Scheme",                 
                ];
                $( "#tags" ).autocomplete({
                  source: availableTags
                });
                
                <?php
                    if(isset($_COOKIE['VI'])){
                        $dataVI = $_COOKIE['VI'];
                        echo "var dataVI = " . $dataVI . ";";
                    }
                    if(isset($_COOKIE['EN'])){
                        $dataEN = $_COOKIE['EN'];
                        echo "var dataEN = " . $dataEN . ";";
                    }
                ?>
            });
            var searchRequest = null;
        </script>
</html>