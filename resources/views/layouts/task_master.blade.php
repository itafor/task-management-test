<!DOCTYPE html>
<html>
<head>
    <title>Laravel skill test | Sortable tasks</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>


  @include('layouts.header')
  <div class="container">
    @yield('task_content')
  </div>




    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

    <script type="text/javascript">

      $('#tablecontents').sortable({
        item:'tr',
        cursor:'move',
        opacity:0.6,
        update: function saveSortedTasks() {
       
        var  tasks = [];

          $("tr.task_items").each(function(index, value){
            tasks.push($(this).attr('data-id'));
          })

          $.ajax({
            url:"{{route('update.sorted.tasks')}}",
            method: "POST",
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             data: {tasks:tasks},
             success: function(data){
              console.log('success', data);
             }
          })
        }
      });


    </script>
  </body>
</html>