<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ArtPiece;
use App\Furniture;
use App\LegalEntity;
use App\ArtPieceRestoration;
class RestorationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($Id)
    {
        return view('restoration.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
    public function destroyArtPieceRestoration($id)
    {

			$restoration = ArtPieceRestoration::find($id)->delete();
			return redirect('/dashboard')->with('success' , 'Restauración no eliminada');
    }

    public function destroyFurnitureRestoration($id)
    {
			$restoration = FurnitureRestoration::find($id)->delete();
			return redirect('/dashboard')->with('success' , 'Restauración no eliminada');
    }

    public function showDeleteArtPieceRestorationConfirmation($id)
		{
			$restoration = ArtPieceRestoration::find($id);
			if(!is_null($restoration))
			{
				$artPiece = $restoration->artPiece;
				$legalEntity = $restoration->legalEntity;
				return view('restoration.deleteArtPiece', ['restoration' => $restoration, 'artPiece' => $artPiece,
					'legalEntity' => $legalEntity]);
			}
			else
			{
				return redirect('dashboard')->with('error' , 'Restauración no encontrada');
			}

		}

    public function showDeleteFurnitureRestorationConfirmation($id)
		{
			$restoration = FurnitureRestoration::find($id);
			if(!is_null($restoration))
			{
				$furniture = $restoration->furniture;
				$legalEntity = $restoration->legalEntity;
				return view('restoration.deleteFurniture', ['restoration' => $restoration, 'furniture' => $furniture,
					'legalEntity' => $legalEntity]);
			}
			else
			{
				return redirect('dashboard')->with('error' , 'Restauración no encontrada');
			}

		}
}
