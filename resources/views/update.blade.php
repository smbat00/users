<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$user->name}}'s update
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('users.edit')}}" method="post">
                        @method('PUT')

                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <div class="input-group mb-3">
                                <input id="name" name="name" value="{{$user->name}}" type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="input-group mb-3">
                                <input id="email" readonly disabled value="{{$user->email}}" type="text" class="form-control" placeholder="Email">
                            </div>
                            <div class="input-group mb-3">
                                <input name="password" type="password" class="form-control" id="password">
                            </div>
                            <div class="input-group mb-3">
                                <input name="password_confirmation" type="password" class="form-control" id="password">
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
</x-app-layout>
