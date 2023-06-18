<h2>Create Employee</h2>
<form action="{{route('employees.new')}}" method="POST">
    @csrf
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br><br>
    <input type="submit" value="Create Employee">
</form>

