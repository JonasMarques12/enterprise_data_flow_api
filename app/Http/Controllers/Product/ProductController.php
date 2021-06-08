<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\Product\ProductRevision;
use App\Models\System\SubGroup;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::orderBy('product_code')->get();
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

        if (is_numeric($request->product["sub_group_code"])) {

            //CONTA QUANTIDADE DE SUBGRUPOS COM O ID OBTIDO (DENTRO DA TABELA DE PRODUTOS)
            $qttyIdOfSubGroups = Product::where('sub_groups_id',  $request->product["sub_groups_id"])->count();
            $qttyIdOfSubGroups++; //1  //10 //100 //1000 //10000

            //SOMA CÓDIGO DO GRUPO + QUANTIDADE DE CADASTROS EXISTENTES DO GRUPO MENCIONADO
            if ($qttyIdOfSubGroups <= 9) {

                $newProductCode = $request->product["sub_group_code"] . '0000' . $qttyIdOfSubGroups; //100100009

            } elseif ($qttyIdOfSubGroups <= 99) {
                $newProductCode = $request->product["sub_group_code"] . '000' . $qttyIdOfSubGroups; //100100099
            } elseif ($qttyIdOfSubGroups <= 999) {
                $newProductCode = $request->product["sub_group_code"] . '00' . $qttyIdOfSubGroups; //100100999
            } elseif ($qttyIdOfSubGroups <= 9999) {
                $newProductCode = $request->product["sub_group_code"] . '0' . $qttyIdOfSubGroups; //100109999
            } elseif ($qttyIdOfSubGroups <= 99999) {
                $newProductCode = $request->product["sub_group_code"] . $qttyIdOfSubGroups; //100199999
            } elseif ($qttyIdOfSubGroups > 99999) {
                $newProductCode = $request->product["sub_group_code"] . $qttyIdOfSubGroups; //1001999999999
            }


            //CADASTRA REVISÃO INICIAL DO PRODUTO
            $newRevisionProduct = new ProductRevision();

            $newRevisionProduct->product_revision_description = $request->product["product_revision_description"];
            $newRevisionProduct->product_revision_sales_price = $request->product["product_revision_sales_price"];
            $newRevisionProduct->product_revision_purchase_price = $request->product["product_revision_purchase_price"];
            $newRevisionProduct->product_revision_length = $request->product["product_revision_length"];
            $newRevisionProduct->product_revision_height = $request->product["product_revision_height"];
            $newRevisionProduct->product_revision_width = $request->product["product_revision_width"];
            $newRevisionProduct->product_revision_weight = $request->product["product_revision_weight"];
            $newRevisionProduct->product_revision_number = $request->product["product_revision_number"];
            $newRevisionProduct->hr_employees_id = $request->product["hr_employees_id"];
            $newRevisionProduct->fin_taxes_ipis_id = $request->product["fin_taxes_ipis_id"];
            $newRevisionProduct->fin_taxes_ncms_id = $request->product["fin_taxes_ncms_id"];
            $newRevisionProduct->uoms_id = $request->product["uoms_id"];

            $newRevisionProduct->save();

            $idRev = $newRevisionProduct->id;

            //CADASTRA NOVO PRODUTO
            $newProduct = new Product();
            $newProduct->product_code = $newProductCode;
            $newProduct->product_image_path =  $request->product["product_image_path"];
            $newProduct->product_revisions_id = $idRev; //OBTIDO LOGO ACIMA, COM BASE NO TOKEN GERADO POR ESSE MÉTODO 
            $newProduct->sub_groups_id = $request->product["sub_groups_id"];

            $newProduct->save();
        } else {
            return "Não é permitido uso de subgrupos alfanuméricos para esta operação.";
        }


        return $newProduct->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = 1;

        $produto = Product::where('id',$id);

        return $produto;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
