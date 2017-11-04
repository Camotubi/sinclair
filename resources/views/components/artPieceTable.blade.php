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
