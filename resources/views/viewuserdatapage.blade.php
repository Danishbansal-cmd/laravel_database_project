<script src = 
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">
</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
<style>
    * {
        font-family: 'Open Sans', sans-serif;
    }
    table, th, td {
        border: 1px solid black;
        text-align: center;
    }
    td a {
        text-decoration:none ;
        font-weight: 800;
        font-size: 14px;
        color: white;
    }
    table {
        border-collapse: collapse;
    }
    .w-5{
        display: none;
    }
    .button {
        margin-top: 30px;
        padding: 10px;
        width: 150px;
        display: block;
        text-align: center;
        vertical-align: center;
        background-color: rgb(25, 231, 42);
        border-radius: 50px;
    }
    .button a , .button button {
        color: white;
        font-weight: bold;
        text-decoration: none;
        font-size: 20px;
        
    }
    .button button {
        border: none;
        background-color: transparent;
        
    }
    th button {
        border: none;
        background-color: transparent;
        font-weight: bold;
        font-size: 16px;
    }
    .se-pre-con {
        display: none;
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(https://upload.wikimedia.org/wikipedia/commons/thumb/2/29/Loader.gif/480px-Loader.gif) center no-repeat rgba(0, 0, 0, 0.521);
}
</style>



<body>
    <div class="se-pre-con"></div>
    <table width=100% border="1" id="myTable">
        <thead>
                <tr>
                    <th>
                        CH<input type="checkbox" id="checkboxAll" onclick="deleteAllArray({{$data}})">
                    </th>
                    <th>
                        <button onclick="sortTable(0)">ID</button>
                    </th>
                    <th>
                        <button onclick="sortTable(1)">NAME</button>
                    </th>
                    <th>
                        <button onclick="sortTable(2)">EMAIL</button>
                    </th>
                    <th>
                        <button onclick="sortTable(3)">DOB</button>
                    </th>
                    <th>
                        <button onclick="sortTable(4)">PHONENO</button>
                    </th>
                    <th>
                        <button onclick="sortTable(5)">ADDRESS</button>
                    </th>
                    <th>
                        EDIT
                    </th>
                    <th>
                        DELETE
                    </th>
                </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr class="delete_mem{{$d['id']}}">
                    <td><input type="checkbox" id ="checkbox{{$d['id']}}" onclick="deleteMultipleArray({{$d['id']}}, {{$data}})"></td>
                    <td>{{$d['id']}}</td>
                    <td>{{$d['name']}}</td>
                    <td>{{$d['email']}}</td>
                    <td>{{$d['dob']}}</td>
                    <td>{{$d['phoneno']}}</td>
                    <td>{{$d['address']}}</td>
                    <td style="background-color: rgb(16, 150, 184);"><a href="/edituserdata/{{$d['id']}}">Edit</a></td>
                    <td style="background-color: rgb(235, 32, 32);"><a href="/deleteuserdata/{{$d['id']}}">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <div style="display:flex;margin-left:10px;">
        <div class="button">
            <a href="/adduser">Add User</a>
        </div>
        <div class="button" style="background-color: rgb(235, 41, 41);margin-left:10px;">
            <button onclick="deleteMultipleDatas()">Delete</button>
        </div>
    </div>
</body>
{{-- 
<span>
    {{$data->links()}}
</span> --}}

<script type="text/javascript">
    function sortTable(rowNumber) {
      var table, rows, switching, i, x, y, shouldSwitch;
      table = document.getElementById("myTable");
      switching = true;
      /*Make a loop that will continue until
      no switching has been done:*/
      while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /*Loop through all table rows (except the
        first, which contains table headers):*/
        for (i = 1; i < (rows.length - 1); i++) {
          //start by saying there should be no switching:
          shouldSwitch = false;
          /*Get the two elements you want to compare,
          one from current row and one from the next:*/
          x = rows[i].getElementsByTagName("TD")[rowNumber];
          y = rows[i + 1].getElementsByTagName("TD")[rowNumber];
          //check if the two rows should switch place:
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            //if so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
          }
        }
        if (shouldSwitch) {
          /*If a switch has been marked, make the switch
          and mark that a switch has been done:*/
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
        }
      }
    }

    //long array to be deleted
    var toBeDeleted = [];
    function deleteMultipleArray(someValue, data){ 
        // console.log(someValue);
        if(document.getElementById('checkbox'+someValue).checked == false){
            toBeDeleted.splice(toBeDeleted.indexOf(someValue),1);
            if(document.querySelector('#checkboxAll').checked == true){
                document.querySelector('#checkboxAll').checked = false;
            }
        }else{
            toBeDeleted.push(someValue);
            if(data.length == toBeDeleted.length){
                document.querySelector('#checkboxAll').checked = true;
            }
        }
        
        console.log(toBeDeleted);
        console.log(toBeDeleted.length == 1);
    }

    //select all array
    function deleteAllArray(data){
        if(document.querySelector('#checkboxAll').checked == true){
            toBeDeleted.splice(0,toBeDeleted.length);
            for(var i=0;i<data.length;i++){
                toBeDeleted.push(data[i]['id']);
                document.querySelector('#checkbox' + data[i]['id']).checked = true;
            }
        }else if(toBeDeleted.length == data.length && document.querySelector('#checkboxAll').checked == false){
            toBeDeleted.splice(0,toBeDeleted.length);
            for(var i=0;i<data.length;i++){
                document.querySelector('#checkbox' + data[i]['id']).checked = false;
            }
        }
        
        console.log(toBeDeleted);
    }

    //delete multiple datas
    function deleteMultipleDatas(){
    if(toBeDeleted.length == 0){
        alert("Please select some records");
    }else{
        $(".se-pre-con").css("display", "block");
        if (confirm("Are you sure you want to delete this Member?")) {
            $.ajax({
                type:"post",
                url:"/delete",
                cache: false,
                data:{'userlisting':toBeDeleted,"_token": "{{ csrf_token() }}",},
                success:function(data){
                    if(data.success == 1){
                        for(var i=0;i<toBeDeleted.length;i++){
                            $(".delete_mem" + toBeDeleted[i]).remove();
                        }
                        
                        alert(data.message);
                    }
                    if(document.querySelector('#checkboxAll').checked == true){
                            document.querySelector('#checkboxAll').checked = false;
                    }
                    $(".se-pre-con").css("display", "none");
                    
                    
                    
                    // location.reload();
                },

            });
        }else {
            $(".se-pre-con").css("display", "none");
            return false;
            
        }
        
    }
}
    
</script>

