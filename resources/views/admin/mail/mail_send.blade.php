@if(session('status'))
    <p>{{session('message')}}</p>
@endif

<form action="/admin/mail-send" method="POST">
    @csrf
    <label for="name">Ad soyad</label>
    <input type="text" name="name" id="name">
    <label for="email">Email</label>
    <input type="text" name="email" id="email">

    <button type="submit">Mail Gönder</button>
</form>
