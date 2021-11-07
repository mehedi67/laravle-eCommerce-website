<div class="col-md-12">
    <h1>You are Admin</h1>
</div>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><h3>List User</h3></div>

            <div class="card-body">
                
                    <div class="alert alert-success text-center" ">
                        <h3>Total User: {{ $users->count() }}</h3>
                    </div>

                <table class=" table table-bordered table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                    </tr>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                        </tr>
                    @empty
                        
                    @endforelse
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3>Add User</h3>
                @if (session('user_status'))
                    <div class="alert alert-success">{{ session('user_status') }}</div>
                    @endif
            </div>
            <div class="card-body">
                <form action="{{ route('userinsert') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class=" form-label"> Name</label>
                        <input type="text" class=" form-control" name="name" id="name" placeholder="Enter name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class=" form-label"> Email</label>
                        <input type="text" class=" form-control" name="email" id="email" placeholder="Enter Email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class=" form-label"> Password</label>
                        <input type="password" class=" form-control" name="password" id="password" placeholder="Enter password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Role</label>
                        <select name="role" id="" class="form-control">
                            <option value="">-Select Role-</option>
                            <option value="2">Admin</option>
                            <option value="3">Shop Keeper</option>
                        </select>
                    </div>
                    
                    <button class="btn btn-success mb-3" type=" submit" >Add User</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>