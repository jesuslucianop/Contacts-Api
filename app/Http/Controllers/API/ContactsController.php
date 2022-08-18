<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contacts;
use App\Models\phones;
use App\Models\addresses;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreContacts;
class ContactsController extends Controller
{
    public function index(Request $request)
    {
        $contact = contacts::with(['phones','addresses']);
        if($request->name){
            $contact->where('name','LIKE','%'.$request->name.'%');
        }
        if($request->lastName){
            $contact->where('lastName','LIKE','%'.$request->lastName.'%');
        }
        if($request->phone){
            $contact->whereHas('phones',function($query) use($request){
                //$query->where('number',$request->phone);
                $query-> where('number', '=', $request->phone);
            });
        }
        /*
        if($request->lastName){
            $contact->where('name','LIKE','%'.$request->name.'%');
        }
        if($request->phone){
            $contact->where('name','LIKE','%'.$request->name.'%');
        }*/
        $contacts = $contact->get();


        return response()->json(['message'=>'Contacs fetched','data'=>
        $contacts],200);


    }
    public function store(request $request)
    {
        $validatorContacts = Validator::make( $request->all(), [
            'name' => ['required','string','max:255'],
            'lastName' => ['required','string','max:255'],
            'phones' => ['required'],
            'addresses' => ['required']
            ]);

            if( $validator -> passes() ){
                $dataContact = array(
                    "name"=>$request->name,
                    "lastName"=>$request->lastName
                );

                $contact = contacts::create([
                    'name' => $request->get('name'),
                    'lastName' => $request->get('lastName')
                ]);
                $contact->save();
                $contactId = $contact->id;
                for ($i = 1; $i < count($request->phones); $i++) {
                    $answersPhones[] = [
                        'number' => $request->phones[$i]['number'],
                        'contactId' => $contactId
                    ];
            }
                for ($x = 1; $x < count($request->addresses); $x++) {
                $answersAddresses[] = [
                    'address' => $request->addresses[$x]['address'],
                    'contactId' => $contactId
                ];
            }
                $phones = phones::insert($answersPhones);
                $addresses = addresses::insert($answersAddresses);

            } else if ($validator->fails()) {
              return response()->json(['errors'=>$validator->errors()->toJson(),'status' => 400]);
            }

             return response()->json(['data'=>$request->all()->toJson(),'status' => 200]);
}
}
