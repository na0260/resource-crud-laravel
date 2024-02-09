<x-app tittle="edit">
    <x-slot name="content">
        <h2 class="text-center">Edit Student</h2>
        <form action="{{route('students.update',$student->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3 mt-3">
                <label for="FirstName" class="form-label">First Name:</label>
                <input type="text" class="form-control" id="FirstName" value="{{$student->FirstName}}" name="FirstName">
            </div>
            @error('FirstName')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="LastName" class="form-label">Last Name:</label>
                <input type="text" class="form-control" id="LastName" value="{{$student->LastName}}" name="LastName">
            </div>
            @error('LastName')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="submit" value="Update" class="btn btn-primary">
        </form>
    </x-slot>
</x-app>
