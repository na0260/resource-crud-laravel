<x-app tittle="Home">
    <x-slot name="content">
        <h2>Student Table<span class="float-end"><a href={{route('students.create')}} class="btn btn-primary">Add New Student</a></span></h2>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{$student->FirstName}}</td>
                    <td>{{$student->LastName}}</td>
                    <td>
                        <a href="{{route('students.edit', $student->id)}}" class="btn btn-primary">Edit</a>
                        <form action="{{route('students.destroy', $student->id)}}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </x-slot>
</x-app>
