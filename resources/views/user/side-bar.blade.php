
<div class="px-md-2 px-0">
    <div class="hd-side box-shadow d-flex flex-column">
        <div class="head d-flex flex-column justify-content-center align-items-center">
            <input type="file" id="avatar-profile" hidden>
            <div class="avatar">
                <span>
                    {{ Auth::user()->surname[0] }}
                </span>
            </div>
            <div class="text">
                <h4>
                    @if (date('a')  == 'am')
                    @awt('Bonjour')
                @else
                    @awt('Bonsoir')
                @endif
                {{ strtok(Auth::user()->surname, '') }}
                </h4>
            </div>
        </div>
    
        <div class="d-flex flex-column">
            <a class="side-item @if(Route::is('user.profile')) active @endif" href="{{ route('user.profile') }}">
                @awt('My informations')
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
            <a class="side-item @if(Route::is('user.favorites')) active @endif" href="{{ route('user.favorites') }}">
                @awt('My favorites')
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
            @if (Auth::user()->isAdmin)
            <a class="side-item text-danger" href="{{ route('admin.index') }}">
                @awt('Administration')
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
            @endif
            @if (Auth::user()->shop)
            <a class="side-item creation" href="">
                @awt('Manage my shop')
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
            @else
            <a class="side-item creation" href="">
                @awt('Create my shop')
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
            @endif
            <a class="side-item @if(Route::is('user.update.password')) active @endif" href="{{ route('user.update.password') }}">
                @awt('Password')
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
            <span class="side-item call-to-action-form" role="button">
                @awt('Logout')
                <i class="fa fa-sign-out" aria-hidden="true"></i>
            </span>
            <form action="{{ route('logout') }}" method="POST" style="display: none;" hidden>
                @csrf
            </form>
        </div>
    </div>
</div>
