<x-app tittle="create">
    <x-slot name="content">
        <h2 class="text-center">Create New Student</h2>
        <form action="{{route('students.store')}}" method="post">
            @csrf
            <div class="mb-3 mt-3">
                <label for="FirstName" class="form-label">First Name:</label>
                <input type="text" class="form-control" id="FirstName" placeholder="Enter Your First Name" name="FirstName">
            </div>
            <div class="mb-3">
                <label for="LastName" class="form-label">Last Name:</label>
                <input type="text" class="form-control" id="LastName" placeholder="Enter Your Last Name" name="LastName">
            </div>
            <input type="submit" value="Add" class="btn btn-primary">
        </form>
    </x-slot>
</x-app>
