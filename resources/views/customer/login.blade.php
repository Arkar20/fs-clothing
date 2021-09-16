<form actin="{{route('customer.store')}}" method="post">
    @csrf
    <input type="email" name="email"/>
    <input type="password" name="password"/>

    <button type="submit">Login</button>
</form>