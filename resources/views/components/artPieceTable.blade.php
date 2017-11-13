<table>
  <tr>
    <th>Names</th>
  </tr>
  @foreach ($artPieces as $artPiece)
  <tr>
    <td>{{$artPiece->name}}</td>
  </tr>
  @endforeach
</table>
{{ $artPieces->links() }}
<table>
  <tr>
    <th>Names</th>
  </tr>
  @foreach ($users as $user)
  <tr>
    <td>{{$user->name}}</td>
  </tr>
  @endforeach
</table>
{{ $users->links() }}
