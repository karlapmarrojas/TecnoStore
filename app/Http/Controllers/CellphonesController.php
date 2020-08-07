<?php

namespace App\Http\Controllers;
use MongoDB;
use Illuminate\Http\Request;

class CellphonesController extends Controller
{
    public function Index() {
        $collection = (new MongoDB\Client)->TecnoStore->Cellphone;
        $cellphone = $collection->find();
        return view('Admin.Cellphone.Index', ['Cellphone' => $cellphone]);
    }

    public function CellphoneStore() {
        $collection = (new MongoDB\Client)->TecnoStore->Cellphone;
        $cellphoneCount = $collection->count();
        $page = 0;
        $page = request("pg") == 0 ? 1 : request("pg");
        $cellphone = $collection->find([], ["limit" => 12, "skip" => ($page-1)  * 12]);
        return view('Cellphone.Index', ['Cellphone' => $cellphone, 'cellphoneCount' => $cellphoneCount]);
    }

    public function Show($id) {  //Details
        $collection = (new MongoDB\Client)->TecnoStore->Cellphone;
        $cellphone = $collection->findOne(["_id" => new MongoDB\BSON\ObjectID($id)]);
        return view('Admin.Cellphone.Details', ["cellphone" => $cellphone ]);
    }

    public function Create() {  
        $collection = (new MongoDB\Client)->TecnoStore->categories;
        $categories = $collection->find();
        return view('Admin.Cellphone.Create', [ "categories" => $categories ]);
    }

    public function Store() {
        $cellphone = [
            "Product Name" => request("product_name"), 
            "Brand Name" => request("brande_name"),
            "Price" => request("price"), 
            "Rating" => [], 
            "Reviews" => request("reviews"), 
            "Reviews Votes" => [],

        ];
        $collection = (new MongoDB\Client)->TecnoStore->Cellphone;
        $insertOneResult = $collection->insertOne($cellphone);
        return redirect("/admin/Cellphone");
    }

    public function Edit($id) { 
        $collection = (new MongoDB\Client)->TecnoStore->Cellphone;
        $cellphone = $collection->findOne(["_id" => new MongoDB\BSON\ObjectID($id)]); 
        return view('Admin.Cellphone.Edit', ["cellphone" => $cellphone ]);
    }

    public function Update() {
        $collection = (new MongoDB\Client)->TecnoStore->Cellphone;
        $cellphone = [
            "Product Name" => request("product_name"), 
            "Brand Name" => request("brande_name"),
            "Price" => request("price"), 
            "Rating" => [], 
            "Reviews" => request("reviews"), 
            "Reviews Votes" => [],

        ];
        $updateOneResult = $collection->updateOne([
            "_id" => new \MongoDB\BSON\ObjectID(request("cellphoneid"))
        ], [
            '$set' => $cellphone
        ]);
        return redirect('/admin/Cellphone/'.request("cellphoneid"));
    }

    public function Delete($id) {  
        $collection = (new MongoDB\Client)->TecnoStore->Cellphone;
        $cellphone = $collection->findOne(["_id" => new MongoDB\BSON\ObjectID($id)]); 
        return view('Admin.Cellphone.Delete', ["cellphone" => $cellphone ]);
    }

    public function Remove() {
        $collection = (new MongoDB\Client)->TecnoStore->Cellphone;
        $deleteOneResult = $collection->deleteOne([
            "_id" => new \MongoDB\BSON\ObjectId(request("cellphoneid"))
        ]);
        return redirect('/admin/Cellphone');
    }
}