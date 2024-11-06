<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read the Json Data</title>
</head>
<body>
    <div id="main">
        <div id="header">
            <h1>Read Json Data</h1>
        </div>

        <div id="load-data"></div>
    </div>

    <script type="text/javascript" src="../js/jquery-3.7.1.min.js"> 
    </script>
    <!-- j-query shortcut to read the json data   used by the    $.getJSON  -------->
    <script>
        $(document).ready(function(){
            $.getJSON(
            "json-placeholder.json",
            function(data) {

                $.each(data, function(key, value){
                $("#load-data").append(value.it + " " + value.title+"<br>"); // (It) exist in the json-placeholder.json
            });    // instead of id
                // $("#load-data").append("Id: "+data.id + "<br>Title: " + data.title + "<br>Body: " + data.body);
            }
            );  // we can only use for reading the data
        })
    </script>
</body>
</html>

<!-- Json placeholder gives the random api  -->
<!-- this is for ((((((((( 1 ))))))))) single api record  https://jsonplaceholder.typicode.com/posts/1 -->
<!-- 
    <script>
        $(document).ready(function(){
            $.ajax({
            url: "https://jsonplaceholder.typicode.com/posts/1",
            type: "GET",
            success: function(data) {
                // console.log(data);

                $("#load-data").append("Id: "+data.id + "<br>Title: " + data.title + "<br>Body: " + data.body);
            }
            })
        })
    </script> -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

<!--  (((((( This is for multiple records  )))))) 
   <script>
        $(document).ready(function(){
            $.ajax({
            url: "https://jsonplaceholder.typicode.com/posts",
            type: "GET",
            success: function(data) {

                $.each(data, function(key, value){
                $("#load-data").append(value.id + " " + value.title+"<br>");
            });
                // $("#load-data").append("Id: "+data.id + "<br>Title: " + data.title + "<br>Body: " + data.body);
            }
            })
        })
    </script>
     -->

     <!-- /////////////////////////////////////////////////// -->

     <!-- 
       /////////////for existing the .json file ////////////////// 
    <script>
        $(document).ready(function(){
            $.ajax({
            url: "json-placeholder.json",
            type: "GET",
            success: function(data) {

                $.each(data, function(key, value){
                $("#load-data").append(value.it + " " + value.title+"<br>"); // (It) exist in the json-placeholder.json
            });    // instead of id
                // $("#load-data").append("Id: "+data.id + "<br>Title: " + data.title + "<br>Body: " + data.body);
            }
            })
        })
    </script> -->



