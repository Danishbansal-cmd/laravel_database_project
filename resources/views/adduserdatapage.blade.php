<style>
    span {
        color:red;
    }
</style>
<form action="/adduser" method="POST">
    @csrf
    <input type="text" name='name' placeholder="Enter your name"><br>
    <span>@error('name'){{$message}}@enderror</span><br>
    
    <input type="email" name='email' placeholder="Enter your email"><br>
    <span>@error('email'){{$message}}@enderror</span><br>

    <input type="date" name='dob' placeholder="Enter your Date of Birth"><br>
    <span>@error('dob'){{$message}}@enderror</span><br>
    
    <input type="text" name='phoneno' placeholder="Enter your phone number"><br>
    <span>@error('phoneno'){{$message}}@enderror</span><br>
    
    <input type="text" name='address' placeholder="Enter your address"><br>
    <span>@error('address'){{$message}}@enderror</span><br>
    <button type="submit">SUBMIT</button>
</form>