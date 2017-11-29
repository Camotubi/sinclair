<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ArtPiece;
class QueriesController extends Controller
{
	public function artPieceFilter(Request $request, ArtPiece $artPieces)
	{
		$artPieces = $artPieces->newQuery();
		if($request->filled('upperDate') && $request->filled('lowerDate'))
		{
			$artPieces->whereBetween('creationDate',[$request->input('lowerDate'),$request->input('upperDate')]);
		}
		elseif($request->filled('upperDate'))
		{
			
			$artPieces->whereBetween('creationDate',['1000-01-01',$request->input('upperDate')]);
		}
		elseif($request->filled('lowerDate'))
		{
			$artPieces->whereBetween('creationDate',[$request->input('lowerDate'),'9999-12-31']);

		}
		$artPieces=$artPieces->get()->toArray();
		if($request->filled('name'))
		{
			$fuse = new \Fuse\Fuse($artPieces,["keys" => ["name"]]);
			$artPieces = $fuse->search($request->input('name'));
		}		
		if($request->filled('technique'))
		{
			$fuse = new \Fuse\Fuse($artPieces,["keys" => ["technique"]]);
			$artPieces = $fuse->search($request->input('technique'));
		}		
		if($request->filled('currentLocation'))
		{
			$fuse = new \Fuse\Fuse($artPieces,["keys" => ["currentLocation"]]);
			$artPieces = $fuse->search($request->input('currentLocation'));
		}		
		$artPieces = json_decode(json_encode($artPieces,true));
	 	return view('artPiece.filter_result',['artPieces' => $artPieces]);
	}
}
