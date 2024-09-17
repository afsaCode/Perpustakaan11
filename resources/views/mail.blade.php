{{-- <form action="{{ route('member.show') }}" method="GET">
    Hello {{ $member->nama }}
    Ini adalah jalan menuju akunmu
</form>
<form action="{{ route('email.show') }}" method="GET">
    @csrf
      Username : {{ $user->username }}
      Password : {{ $user->password }}
</form>
       --}}
       <html>
       <body>
       {!! $content !!}
       </body>
       </html>
       
