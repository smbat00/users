<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Users List
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userAddModal">
                        Add New User
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="userAddModal" tabindex="-1" aria-labelledby="userAddModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="userAddModalLabel">Add New User</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('users.create')}}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                            <div class="input-group mb-3">
                                                <input id="name" name="name" type="text" class="form-control" placeholder="Name">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input id="email" name="email" type="text" class="form-control" placeholder="Email">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input name="password" type="password" class="form-control" id="password">
                                            </div>
                                            <div class="input-group mb-3">
                                                <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6 text-gray-900">
                    @foreach($users as $user)
                        <div class="row">
                            <div class="col-md-1">
                                {{$user->id}}
                            </div>
                            <div class="col-md-3">
                                {{$user->name}}
                            </div>
                            <div class="col-md-4">
                                {{$user->email}}
                            </div>
                            <div class="col-md-2">
                                    <form action="{{ route('users.delete', ['id' => $user->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button>Delete</button>
                                    </form>
                            </div>
                            <div class="col-md-2">
                               <a href="{{route('users.item',['id'=>$user->id])}}">Update</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
