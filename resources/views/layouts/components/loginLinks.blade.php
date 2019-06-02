<?php
    if (!isset($baseUrl))
        $baseUrl = '';
?>
@guest
    <li class="nav-item">
        <a class="nav-link" href="{{ url($baseUrl . '/login') }}">{{ __('auth.Login') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url($baseUrl . '/register') }}">{{ __('auth.Register') }}</a>
    </li>
@else
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }} <span class="caret"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ url($baseUrl . '/edit') }}">
                {{ __('auth.Profile') }}
            </a>

            <a class="dropdown-item" href="{{ url($baseUrl . '/logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('auth.Logout') }}
            </a>

            <form id="logout-form" action="{{ url($baseUrl . '/logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
@endguest