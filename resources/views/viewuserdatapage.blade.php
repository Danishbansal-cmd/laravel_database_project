<style>
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
    .button a {
        color: white;
        font-weight: bold;
        text-decoration: none;
        
    }
</style>



<table width=100% border="1">
    <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    NAME
                </th>
                <th>
                    EMAIL
                </th>
                <th>
                    DOB
                </th>
                <th>
                    PHONENO
                </th>
                <th>
                    ADDRESS
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
            <tr>
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

<div class="button">
    <a href="/adduser">Add User</a>
</div>
{{-- 
<span>
    {{$data->links()}}
</span> --}}