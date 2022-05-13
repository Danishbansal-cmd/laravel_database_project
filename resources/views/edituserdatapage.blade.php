<style>
    span {
        color:red;
    }
</style>
<form action="/edituserdataaction" method="POST">
    @csrf
    <input type="hidden" name='id' value='{{$edituserdata['id']}}'>
    <input type="text" name='name' placeholder="Enter your name" value='{{$edituserdata['name']}}'><br>
    <span>@error('name'){{$message}}@enderror</span><br>
    
    <input type="email" name='email' placeholder="Enter your email" value='{{$edituserdata['email']}}'><br>
    <span>@error('email'){{$message}}@enderror</span><br>
    
    <input type="text" name='phoneno' placeholder="Enter your phone number" value='{{$edituserdata['phoneno']}}'><br>
    <span>@error('phoneno'){{$message}}@enderror</span><br>
    
    <input type="text" name='address' placeholder="Enter your address" value='{{$edituserdata['address']}}'><br>
    <span>@error('address'){{$message}}@enderror</span><br>
    <button type="submit">SUBMIT</button>
</form>