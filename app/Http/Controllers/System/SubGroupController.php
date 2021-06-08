<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\System\Group;
use App\Models\System\SubGroup;
use Illuminate\Http\Request;

class SubGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SubGroup::orderBy('sub_group_code')->get();
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
        //VERIFICA SE O CÓDIGO DO GRUPO PAI É NÚMERO OU STRING
        if (is_numeric($request->subGroup["group_code"])) {

            $groups_id = Group::where('group_code', $request->subGroup["group_code"])->get('id');

            foreach ($groups_id as $group_id) {
                $id = $group_id->id;
            }

            //CONTA QUANTIDADE DE SUBGRUPOS COM O ID OBTIDO
            $qttyIdOnSubGroups = SubGroup::where('groups_id', $id)->count();
            $qttyIdOnSubGroups++;
            //SOMA CÓDIGO DO GRUPO + QUANTIDADE DE CADASTROS EXISTENTES DO GRUPO MENCIONADO
            $newSubGroupCode = $request->subGroup["group_code"] + $qttyIdOnSubGroups;
            //CADASTRA NOVO SUBGRUPO
            $newSubGroup = new SubGroup;
            $newSubGroup->sub_group_code = $newSubGroupCode;
            $newSubGroup->sub_group_name = $request->subGroup["sub_group_name"];
            $newSubGroup->sub_group_description = $request->subGroup["sub_group_description"];
            $newSubGroup->groups_id = $id;
            $newSubGroup->save();
        } else {
            return "Não é possível criar um subgrupo alfanumérico. Por favor, utilize apenas números.";
        }
        return $newSubGroupCode;

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
}
