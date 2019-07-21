<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exemplary;
class ExemplaryController extends Controller
{
    public function createExemplary (Request $request)
{
	$Exemplary = new Exemplary;
		$exemplary->code = $request->code;
		$exemplary->name = $request->name;
		$exemplary->author = $request->author;
        $exemplary->publishing_company = $request->publishing_company;
		$exemplary->branch_id = $request->branch_id;
        
	$exemplary->save();


	return response()->success($exemplary);

}

public function listExemplary()
{
	return Exemplary::all();

}

public function showExemplary($id)
{
	$exemplary = Exemplary::findOrFail($id);
	if ($exemplary){
		return response()->success($exemplary);
	}else{
		$data = "Exemplary não encontrado, verifique id";
		return response()->error($data, 400);

	}

}

public function updateExemplary(Request $request, $id)
{
	$exemplary = Exemplary::findOrFail($id);
	if($request->code)
		$exemplary->code = $request->code;
	if($request->name)
		$exemplary->name = $request->name;
	if($request->author)
		$exemplary->author = $request->author;
	if($request->publishing_company)
        $exemplary->publishing_company = $request->publishing_company;
        if($request->branch_id)
		$exemplary->branch_id = $request->branch_id;
        
	$exemplary->save();

	return response()->success($exemplary);


}

public function relationExemplary(Request $request, $id)
{
	$exemplary = Exemplary::findOrFail($id);
	if($request->branch_id)
	$exemplary->branch_id = $request->branch_id;
		$exemplary->save();

	return response()->success($exemplary);

}
public function relationDeleteExemplary(Request $request, $id)
{
	$exemplary = Exemplary::findOrFail($id);
	if($request->branch_id)
	$exemplary->branch_id = $request->null;
	$exemplary->save();

	return response()->success($exemplary);

}
public function deleteExemplary($id)
{
	Exemplary::destroy($id);
	return response()-> json(['Exemplary deletado']);
}


}
