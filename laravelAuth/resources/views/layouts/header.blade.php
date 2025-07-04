<a href="{{route('users.index')}}" class="text-xl font-bold">Laravel Auth</a>
<div class="flex space-x-4">
    <a href="{{ route('login.view') }}" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Login</a>
    <a href="{{ route('register.view') }}"
        class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Register</a>
    @auth
        <span class="border-r-2 pr-2 flex items-center">
            Salutations à toi, {{ Auth::user()->name }}
        </span>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="cursor-pointer px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Logout</button>
        </form>
    @endauth
</div>