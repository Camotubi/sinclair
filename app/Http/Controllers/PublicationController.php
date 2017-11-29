<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PublicationCreateRequest;
use App\Http\Requests\PublicationUpdateRequest;

use App\Publication;
use App\User;
use App\Tag;

class PublicationController extends Controller
{
	public function __construct()
	{
		if(config('app.enableGuards'))
		{
			$this->middleware('auth', ['only' => ['index','create','store','edit','update','destroy']]);
		}
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$publications = Publication::paginate(10);
			return view('publication.index', ['publications' => $publications]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
			$users = User::all();
			$tags = Tag::all();
			$numUsers = $request->input('numUsers');
		  $numTags = $request->input('numTags');
		  if(is_null($numUsers))
		  {
			$numUsers = 1;
		  }
		  if(is_null($numTags))
		  {
			$numTags = 1;
		  }
		  $modUserFields = $request->input('modUserFields');
		  $modTagFields = $request->input('modTagFields');
		  if($modTagFields == 'p')
		  {
			$numTags++;
		  }elseif($modTagFields == 'm')
		  {
			$numTags--;
		  }
		  if($modUserFields == 'p')
		  {
			$numUsers++;
		  }elseif($modUserFields == 'm')
		  {
			$numUsers--;
		  }
	    return view('publication.create',
				[
					'numUsers' => $numUsers,
					'numTags' => $numTags,
					'modTagFields' => $modTagFields,
					'modUserFields' => $modUserFields,
					'users' => $users,
					'tags' => $tags
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
      $publication = new Publication;
      $publication->title = $request-> input('title');
      $publication->body = $request-> input('body');
			$publication->user()->associate($request->input('users'));
			/*$usersString = $request->input('users');

		  $usersId   = array();
		  foreach($usersString as $key=>$string)
		  {
			$usersId[$key] = explode('-',$string)[0];
		}*/


      $publication->save();
			$tagsString = $request->input('tags');
			$tagsId   = array();
		  foreach($tagsString as $key=>$string)
		  {
			$tagsId[$key] = explode('-',$string)[0];
		  }
			$publication->tags()->attach($tagsId);
			return redirect('dashboard')->with('success' , 'Publicación registrada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
			$publication = Publication::find($id);
			if(!is_null($publication))
			{
				$user = $publication->user;
				$tags = $publication->tags()->get();
			  return view('publication.show', ['publication' => $publication,
					'user' => $user, 'tags' => $tags]);
			}
			else
			{
			  return redirect('dashboard')->with('error' , 'Publicación no encontrada');
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
			$publication = Publication::find($id);
			if(!is_null($publication))
			{
				$users = User::all();
			  return view('publication.edit', ['publication' => $publication, 'users' => $users]);
			}
			else
			{
			  return redirect('dashboard')->with('error' , 'Publicación no encontrada');
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
	    $publication = Publication::find($id);
			$publication->title = $request-> input('title');
      $publication->body = $request-> input('body');
      $apublication->save();
			return redirect('publication/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
	    $publication = Publication::find($id);
			$publication->user()->dissociate();
			$publication->tags()->detach();
			$publication->delete();
			return redirect('dashboard')->with('success' , 'Publicación eliminada');
    }

		public function showDeleteConfirmation($id)
		{
			$publication = Publication::find($id);
			if(!is_null($publication))
			{
				return view('publication.delete', ['publication' => $publication]);
			}
			else
			{
				return redirect('dashboard')->with('error' , 'Publicación no encontrada');
			}

		}

		public function apiPaginate($amount)
		{

			$publications = Publication::paginate($amount);
			return $publications;
		}

		public function getpublication($id)
		{
			$publication = Publication::where('id',$id)->first();
			return $publication;
		}

		public function frontIndex()
		{
			return view('frontend.publication.index', ['publications'=> $this->apiPaginate(10)]);
		}

		public function frontShow($id)
		{
			$publication = Publication::find($id);
			$user = $publication->user()->get();
			$tags = $publication->tags()->get();
			return view('frontend.publication.show',
				[
					'publication' => $this->getpublication($id),
					'user' => $user,
					'tags' => $tags
				]
			);
		}
}
