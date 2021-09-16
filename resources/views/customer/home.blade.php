    <p>{{auth()->guard('customer')->user()->email}}</p> 
    <form action="{{route('customer.logout')}}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>

<p>hello</p>
{{-- <p>heohir</p>