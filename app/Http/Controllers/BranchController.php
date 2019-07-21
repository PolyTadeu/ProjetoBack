<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;

class BranchController extends Controller
{
    public function createBranch (Request $request)
{
    $branch = new Branch;
		$branch->cnpj = $request->cnpj;
		$branch->email = $request->email;
		$branch->phone = $request->phone;
        $branch->adress = $request->adress;
		$branch->number_employess = $request->number_employess;
	
	$branch->save();

	return response()->success($branch);

}
public function listBranch()
{
	return branch::all();

}

public function showBranch($id)
{
	$branch = Branch::findOrFail($id);
	if ($branch){
		return response()->success($branch);
	}else{
		$data = "Branch não encontrada, verifique id";
		return response()->error($data, 400);

	}

}

public function updateBranch(Request $request, $id)
{
	$branch = Branch::findOrFail($id);
	if($request->cnpj)
		$branch->cnpj = $request->cnpj;
	if($request->email)
		$branch->email = $request->email;
	if($request->phone)
		$branch->phone = $request->phone;
	if($request->adress)
        $branch->adress = $request->adress;
    if($request->number_employess)
		$branch->number_employess = $request->number_employess;
	$branch->save();

	return response()->success($branch);


}


public function deleteBranch($id)
{
	Branch::destroy($id);
	return response()-> json(['Branch deletada']);
}
}
