@extends('admin.admin-layout')

@section('title', 'Active User')

@section('content')
    
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">School Management</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="mt-4">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('admin.index')}}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.active-user')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User list</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Product</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Faculty Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DataTables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jsGrid</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link ">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h1 class="m-0">Active User</h1> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          </ol>
        </div>
      </div>
    </div>
  </div>
  

  <div class="container-fluid">

    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
       
        <li class="nav-item">
          <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Active users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Inactive users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Add users</a>
          </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="card">
                <div class="container">
                  
                        
                  </div>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Full name</th>
                      <th>Email</th>
                      <th>Department</th>
                      <th>Referrence number</th>
                      <th>User status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            
                            
                    <tr>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->department}}</td>
                      <td>{{$user->referrence_number}}</td>
                      <td>{{$user->user_status}}</td>
                      <td>
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal-{{$user->id}}">View <i class="fas fa-eye fa-sm"></i></button>
                        <button class="btn btn-danger btn-sm disable_user" value="{{$user->id}}">Disable <i class="fas fa-trash-alt fa-sm"></i></button>
                    </td>
                    </tr>
                       <!-- Modal -->
                       <div class="modal fade" id="exampleModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit {{$user->name}}`s details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">

                            <input type="hidden" name="id" value="{{$user->id}}">
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Full name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" readonly autocomplete="name" placeholder="required" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  placeholder="required" readonly autocomplete="email">
    
                                    {{-- @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                    @if($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Department') }}</label>
    
                                <div class="col-md-6">
                                    <input id="department" type="text" value="{{$user->department}}" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}"  placeholder="required" readonly autocomplete="department">
    
                                    {{-- @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                    @if($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="referrence_number" class="col-md-4 col-form-label text-md-end">{{ __('Referrence number') }}</label>
    
                                <div class="col-md-6">
                                    <input id="referrence_number" type="text" value="{{$user->referrence_number}}" class="form-control @error('referrence_number') is-invalid @enderror" name="referrence_number" value="{{ old('referrence_number') }}"  placeholder="required" readonly autocomplete="department">
    
                                    {{-- @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror --}}
                                    @if($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                                </div>
                            </div>



                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success">Edit <i class="fas fa-pencil-alt fa-sm"></i></button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                     @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        {{-- <div class="card-header">{{ __('Register') }}</div> --}}
        
                        <div class="card-body">
                            {{-- @if(Session::get('success'))
                            <div class="alert alert-success thisadd">
                                {{Session::get('success')}}
                            </div>
                                @endif --}}
                          
                            <form method="POST" action="{{ route('admin.adduser') }}">
                                @csrf
        
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="required" autofocus>
        
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="required" required autocomplete="email">
        
                                        {{-- @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror --}}
                                        @if($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                      @endif
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="department" class="col-md-4 col-form-label text-md-end">{{ __('Department') }}</label>
        
                                    <div class="col-md-6">
                                        <select name="department" id="department" type="text" class="form-control @error('department') is-invalid @enderror" required autocomplete="department">
                                            <option value="IT DEPARTMENT">IT DEPARTMENT</option>
                                            <option value="LAW DEPARTMENT">LAW DEPARTMENT</option>
                                            <option value="SCIENCE DEPARTMENT">SCIENCE DEPARTMENT</option>
                                            <option value="ENGLISH DEPARTMENT">ENGLISH DEPARTMENT</option>
                                        </select>
                                        @error('department')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
        
                                    <div class="input-group col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="required" required autocomplete="new-password">
                                        <span class="input-group-append">
                                          <button  class="btn btn-outline-secondary" type="button">
                                              <i class="fas fa-eye" id="togglePassword" style=" "></i>
                                          </button>
                                      </span>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="row mb-3">
                                    <label for="password_confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
        
                                    <div class="input-group col-md-6">
                                        <input id="password_confirm" type="password" class="form-control" name="password_confirmation" placeholder="required" required autocomplete="new-password">
                                        <span class="input-group-append">
                                          <button  class="btn btn-outline-secondary" type="button">
                                              <i class="fas fa-eye" id="togglePasswordConfirm" style=" "></i>
                                          </button>
                                      </span>
                                      </div>
                                </div>

                                {{-- <div class="row">
                                  <div class="input-group col-md-4">
                                      <input class="form-control py-2" type="search" value="search" id="example-search-input">
                                      <span class="input-group-append">
                                          <button class="btn btn-outline-secondary" type="button">
                                              <i class="fa fa-search"></i>
                                          </button>
                                      </span>
                                  </div>
                              </div> --}}

        
                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Submit') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
      </div>
   


@endsection