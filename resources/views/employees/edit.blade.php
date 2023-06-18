<h2>Edit User</h2>
<form action="{{route('employees.edit', $employee->id)}}" method="POST">
    @csrf
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" value="{{old('name', $employee->name)}}"><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" value="{{old('email', $employee->email)}}"><br><br>
    <input type="submit" value="Save Changes">
</form>

