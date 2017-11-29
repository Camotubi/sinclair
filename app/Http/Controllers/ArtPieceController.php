<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArtPieceCreateRequest;
use App\Http\Requests\ArtPieceUpdateRequest;
use App\ArtPiece;
use App\ArtStyle;
use App\Rent;
use App\Multimedia;
use App\LegalEntity;
use Illuminate\Support\Facades\DB;

class ArtPieceController extends Controller
{
	public function __construct()
	{

		if(config('app.enableGuards'))
		{
			$this->middleware('auth', ['only' => ['index','create','store','edit','update','destroy']]);
		}
	}

	/**
	 *	Display a listing of the resource.
	 *
	 * 	@return \Illuminate\Http\Response
	 */
	public function index()
	{
		$artPieces = ArtPiece::paginate(12);
		return view('artPiece.index',['artPieces'=> $artPieces]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Request $request)
	{
		$legalEntities = LegalEntity::all();
		$artStyles = ArtStyle::all();
		$numArtStyles = $request->input('numArtStyles');
		if(is_null($numArtStyles))
	  {
		$numArtStyles = 1;
	  }
		$modArtStyleFields = $request->input('modArtStyleFields');
		if($modArtStyleFields == 'p')
	  {
		$numArtStyles++;
	  }elseif($modArtStyleFields == 'm')
	  {
		$numArtStyles--;
	  }
		return view('artPiece.create',
			[
				'legalEntities' => $legalEntities,
				'artStyles' => $artStyles,
				'numArtStyles' => $numArtStyles,
				'modArtStyleFields' => $modArtStyleFields,
			]
		);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$artPiece = new ArtPiece;
		$artPiece->name = $request->input ('name');
		$artPiece->currentLocation = $request->input ('currentLocation');
		$artPiece->technique = $request->input ('technique');
		$artPiece->criticalAnalisis = $request->input ('criticalAnalisis');
		$artPiece->creationDate = $request->input ('creationDate');
		$artPiece->donatorId = $request->input('donatorId');
		if ( $request->input ('generatePublication') ) {
			$artPiece->generatePublication = true;
		}
		$artPiece->save();
		$artStylesString = $request->input('artStyles');
		$artStylesId   = array();
	  foreach($artStylesString as $key=>$string)
	  {
		$artStylesId[$key] = explode('-',$string)[0];
	  }
		$artPiece->donator()->associate($request->input ('donatorId'));
		$artPiece->artStyles()->attach($artStylesId);
		return redirect('dashboard')->with('success' , 'Obra registrada');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$artPiece = ArtPiece::find($id);
		if(!is_null($artPiece))
		{
			$donator = LegalEntity::find($artPiece->donatorId);
			return view('artPiece.show', ['artPiece' => $artPiece, 'donator' => $donator,]);
		}
		else
		{
			return redirect('dashboard')->with('error' , 'Obra de arte no encontrada');
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$artPiece = ArtPiece::find($id);
		if(!is_null($artPiece))
		{
			$legalEntities = LegalEntity::all();
			$artStyles = ArtStyle::all();
			return view('artPiece.edit', ['artPiece' => $artPiece,
				'legalEntities' => $legalEntities, 'artStyles' => $artStyles]);
		}
		else
		{
			return redirect('dashboard')->with('error' , 'Obra de arte no encontrada');
		}
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
		$artPiece = ArtPiece::find($id);
		$artPiece->name = $request->input ('name');
		$artPiece->currentLocation = $request->input ('currentLocation');
		$artPiece->technique = $request->input ('technique');
		$artPiece->criticalAnalisis = $request->input ('criticalAnalisis');
		$artPiece->creationDate = $request->input ('creationDate');
		$artPiece->donatorId = $request->input('donatorId');
		if ( $request->input ('generatePublication') ) {
			$artPiece->generatePublication = true;
		}
		$artPiece->save();
		return redirect('artPiece/'.$id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$artPiece = ArtPiece::find($id);
		$artPiece->donator()->dissociate();
		$artPiece->artStyles()->detach();
		$artPiece->exhibitions()->detach();
		$artPiece->legalEntityRestorations()->detach();
		$artPiece->legalEntityPossessions()->detach();
		$rents = $artPiece->rents()->get();
		foreach($rents as $rent)
		{
			$rent->artPiece()->dissociate();
			$rent->legalEntity()->dissociate();
			$rent->delete();
		}
		$insurances = $artPiece->insurances()->get()
		foreach($insurances as $insurance)
		{
			$insurance->artPiece()->dissociate();
			$insurance->insuranceCarrier()->dissociate();
			$insurance->delete();
		}
		$artPiece->multimedia()->detach();
		$artPiece->delete();
		return redirect('dashboard')->with('success' , 'Obra eliminada');
	}

	public function apiPaginate($amount)
	{

		$artPieces = ArtPiece::paginate($amount);
		return $artPieces;
	}
	public function createRestoration($id)
	{
		$artPiece = ArtPiece::find($id);
		$legalEntities = LegalEntity::all();
		return view('restoration.create', ['legalEntities' => $legalEntities,'artPiece' => $artPiece]);
	}
	public function addRestoration($id,Request $request)
	{
		$artPiece = ArtPiece::find($id);
		$restorationDescription = $request->input('description');
		$restorationDate = $request->input('restorationDate');
		$restorerId = $request->input('restorerId');
		$artPiece->legalEntityRestorations()->attach($restorerId,
			[
				'restorationDate' => $restorationDate,
				'description' => $restorationDescription
			]
		);
		return redirect('/artPiece/'.$artPiece->id)->with('success' , 'Restauracion registrada');

	}
	public function apiImagesPaginate($id,$amount)
	{

		$images = ArtPiece::find($id)->multimedia()->paginate($amount);
		return $images;
	}
	public function apiRestorationPaginate($id,$amount)
	{

		$restorations = ArtPiece::find($id)->legalEntityRestorations()->paginate($amount);
		return $restorations;
	}
	public function getArtPiece($id)
	{
		$artPiece = ArtPiece::where('id',$id)->first();
		return $artPiece;
	}

	public function frontIndex()
	{
		return view('frontend.artPiece.index', ['artPieces'=> $this->apiPaginate(15)]);
	}

	public function frontShow($id)
	{
		return view('frontend.artPiece.show',['artPiece'=>$this->getArtPiece($id)]);
	}

	public function addImage($id)
	{
		return view('artPiece.add_image',['artPiece'=>$this->getArtPiece($id)]);
	}
	public function storeImage(Request $request, $id)
	{
		$artPiece = ArtPiece::where('id',$id)->first();
		$imgFile = $request->file('image')->store('artPieceImgs','public');
		$multimedia = new Multimedia;
		$multimedia->description = $request->input('description');
		$multimedia->fileLocation = $imgFile;
		$multimedia->save();
		$multimedia->artPieces()->attach($artPiece->id);

		return redirect('artPiece/'.$id);


	}

	public function showDeleteConfirmation($id)
	{
		$artPiece = ArtPiece::find($id);
		if(!is_null($artPiece))
		{
			return view('artPiece.delete', ['artPiece' => $artPiece]);
		}
		else
		{
			return redirect('dashboard')->with('error' , 'Obra de arte no encontrada');
		}

	}

	public function addRent($id)
	{
			$artPiece = ArtPiece::find($id);
			$legalEntities = LegalEntity::all();
	    return view('artPiece.add_rent', ['artPiece' => $artPiece,
				'legalEntities' => $legalEntities]);

	}
	public function storeRent($id,Request $request)
	{

	      $rent = new Rent;
	      $rent->moneyQuantity = $request-> input('moneyQuantity');
	      $rent->effectiveDate = $request-> input('effectiveDate');
	      $rent->terminationDate = $request-> input('terminationDate');
	      $rent->artPiece()->associate($id);
	      $rent->legalEntity()->associate(explode('-',$request->input('legalEntityId'))[0]);
	      $rent->save();
				return redirect('dashboard')->with('success' , 'Alquiler registrado');

	}
}
