<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ArtPiece;
use App\Furniture;
use App\LegalEntity;

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
    public function create()
    {
        //
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
        //
    }

    public function showDeleteArtPieceConfirmation($id)
		{
			$restoration = ;
			if(!is_null($rent))
			{
				$artPiece = ArtPiece::find($restoration->artPieceId);
				$legalEntity = LegalEntity::find($restoration->legalEntityId);
				return view('rent.deleteArtPiece', ['restoration' => $restoration, 'artPiece' => $artPiece,
					'legalEntity' => $legalEntity]);
			}
			else
			{
				return redirect('dashboard')->with('error' , 'Restauración no encontrada');
			}

		}

    public function showDeleteFurnitureConfirmation($id)
		{
			$restoration = ;
			if(!is_null($rent))
			{
				$furniture = Furniture::find($restoration->furnitureId);
				$legalEntity = LegalEntity::find($restoration->legalEntityId);
				return view('rent.deleteFurniture', ['restoration' => $restoration, 'furniture' => $furniture,
					'legalEntity' => $legalEntity]);
			}
			else
			{
				return redirect('dashboard')->with('error' , 'Restauración no encontrada');
			}

		}
}
