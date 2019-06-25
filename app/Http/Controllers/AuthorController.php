<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

  public function showAllAuthors()
  {
    return response()->json(author::all());
  }

  public function showOneAuthor($id)
  {
    return response()->json(Author::find($id));
  }

  public function create(Request $request)
  {
    $this->validate($request, [
      'first_name' => 'required|alpha',
      'email' => 'required|email|unique:authors',
      'age' => 'required|integer'
    ]);

    $author = Author::create($request->all());

    return response()->json($author, 201);
  }

  public function update(Request $request, $id)
  {
    $author = Author::findOrFail($id);
    $author->update($request->all());

    return response()->json($author, 200);
  }

  public function delete($id)
  {
    Author::findOrFail($id)->delete();
    return response('Deleted Successfully', 200);
  }

}
