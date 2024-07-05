@extends('dashboard.layouts.main')

@section('content')
    <div class="row">
        <div class="col-xl-4">

            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    {{-- @dd($logs) --}}
                    <div>
                        @if ($user->avatar)
                            <img class="img-account-profile rounded-circle mb-2 mx-auto d-block"
                                src="{{ asset('storage/' . $user->avatar) }}" style="width: 200px; height: 200px;">
                        @else
                            <img class="img-account-profile rounded-circle mb-2  mx-auto d-block"
                                src="{{ asset('assets/images/undraw_profile.svg') }}" style="width: 200px; height: 200px;">
                        @endif
                    </div>

                </div>
            </div>
        </div>
        <div class="col-xl-8">

            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form>

                        <div class="mb-3">
                            <label class="small mb-1" for="inputUsername">Username (how your name will appear to
                                other users on the site)</label>
                            <input class="form-control" id="inputUsername" type="text" value="{{ $user->username }}"
                                disabled>
                        </div>

                        <div class="row gx-3 mb-3">

                            <label class="small mb-1" for="name">Name</label>
                            <input class="form-control" id="name" type="text" value="{{ $user->name }}" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email address</label>
                            <input class="form-control" id="inputEmailAddress" type="email" value="{{ $user->email }}"
                                disabled>
                        </div>

                        <div class="mb-3">
                            <label class="small mb-1" for="status">Status</label>
                            <input class="form-control" id="status" type="text" value="{{ $user->status }}" disabled>
                        </div>

                        <div class="mb-3">
                            <label class="small mb-1" for="status">Terakhir Login</label>
                            <input class="form-control" id="status" type="text"
                                value="{{ (new DateTime($user->lastLoginAt(), new DateTimeZone('UTC')))->setTimezone(new DateTimeZone('Asia/Jakarta'))->format('Y-m-d H:i:s') }}"
                                disabled>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
