<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
Class TeacherController extends Controller {
    use ApiResponser;
private $request;
public function __construct(Request $request){
$this->request = $request;
}
    public function users(){
        $users = User::all();
        // return response()->json($users, 200);
        return $this->successResponse($users);    
    }
    public function show($teacherid)
    {
        //
        $user = User::where('teacherid','=',$teacherid)->get();
        return $this->successResponse($user); 
    }
    public function adduser(Request $request ){
        $rules = [
            'lastname' => 'required|alpha|max:255',
            'firstname' => 'required|alpha|max:255',
            'middlename' => 'required|alpha|max:255',
            'birthday' => 'date',
            'age' => 'required|gt:18',

        ];
        $this->validate($request,$rules);
        $user = User::create($request->all());
        return $this->successResponse($user, Response::HTTP_CREATED);
       
}
    public function updateuser(Request $request,$teacherid)
    {
    $rules = [
        'lastname' => 'required|alpha|max:255',
        'firstname' => 'required|alpha|max:255',
        'middlename' => 'required|alpha|max:255',
        'birthday' => 'date',
        'age' => 'required|gt:18',
    ];
    $this->validate($request, $rules);
    $user = User::findOrFail($teacherid);
    $user->fill($request->all());

    // if no changes happen
    if ($user->isClean()) {
    return $this->errorResponse('At least one value must
    change', Response::HTTP_UNPROCESSABLE_ENTITY);
    }
    $user->save();
    return $this->successResponse($user, Response::HTTP_CREATED);
}
    public function deleteuser($teacherid)
    {
    $user = User::findOrFail($teacherid);
    $user->delete();
    return $this->successResponse($user, Response::HTTP_CREATED);

 
    // old code
    /*
    $user = User::where('userid', $id)->first();
    if($user){
    $user->delete();
    return $this->successResponse($user);
    }
    {
    return $this->errorResponse('User ID Does Not Exists',
    Response::HTTP_NOT_FOUND);
    }
    */
    }
}